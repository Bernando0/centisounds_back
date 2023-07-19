<?php

namespace App\Http\Controllers;

use App\Models\Sound;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoundController extends Controller
{
    function filter($list, callable $func)
{
    if (isEmpty($list)) {
        return l();
    }

    $current = head($list);
    $tailElements = tail($list);
    if ($func($current)) {
        return cons($current, filter($tailElements, $func));
    }
    return filter($tailElements, $func);
}


    public function create(Request $request){
        $file = Storage::disk('public_uploads')->put('files', $request->file);
        $img = Storage::disk('public_uploads')->put('images', $request->img);

        $newSound = new Sound();
        $newSound->title = $request->title;
        $newSound->type = $request->type;
        $newSound->authorName = $request->authorName;
        $newSound->genreId = $request->genreId;
        $newSound->filePath = 'http://127.0.0.1:8000/uploads/' . '' . $file;
        $newSound->imgPath = 'http://127.0.0.1:8000/uploads/' . '' . $img;
        $newSound->save();
    }

    public function delete($id){
        $newSound = Sound::find($id);
        $newSound->delete();
    }

    public function update($id, Request $request){

        $file = Storage::disk('public_uploads')->put('files', $request->file);
        $img = Storage::disk('public_uploads')->put('images', $request->img); 
        $newSound = Sound::find($id);
        $newSound->title = $request->title;
        $newSound->authorName = $request->authorName;
        $newSound->filePath = $file;
        $newSound->imgPath = $img;
        $newSound->save();
    }

    public function get($id){
        return Sound::with('genre')->find($id);
    }

    public function list(){
        $tempList = Sound::with('genre')->get();
        return $tempList;
    }

    public function musiclist(){
        $tempList = Sound::where('type', 'music')->with('genre')->get();
        return $tempList;
    }
    public function musiclistsix(){
        $tempList = Sound::where('type', 'music')->with('genre')->get();
        $newList = Sound::where('type', '')->with('genre')->get();
        if($tempList->count()>5){
            for($i = 0;$i<6;$i++){
                $newList[$i] = $tempList[$i];
            }
        }
        else{
            $newList = $tempList;
        }
        
        return $newList;
        
    }
    
    public function beatslist(){
        $tempList = Sound::where('type', 'beat')->with('genre')->get();
        return $tempList;
    }
    public function sampleslist(){
        $tempList = Sound::where('type', 'sample')->with('genre')->get();
        return $tempList;
    }
}
