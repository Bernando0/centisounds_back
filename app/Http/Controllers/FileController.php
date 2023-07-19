<?php

namespace App\Http\Controllers;

use App\Models\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function create(Request $request){

        // $pub = "C:\OpenServer\domains\audio_app\public";
//        $f_name = basename($request->audio);
//        copy($request->audio, $pub);
        $file = Storage::disk('public_uploads')->put('files', $request->file);
        $newFile = new File();
        $newFile->filePath = $file;
        $newFile->save();
        return $newFile;
    }

    public function delete($id){
        $newFile = File::find($id);
        $newFile->delete();
    }

    public function update($id, Request $request){
        $newFile = Audio::find($id);
        $newFile->audioPath = $request->audioPath;
        $newFile->save();
    }

    public function get($id){
        return File::find($id);
    }

    public function list(){
        $newList = File::all();
        return $newList;
    }
}
