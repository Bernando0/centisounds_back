<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function create(Request $request){
        $newGenre = new Genre();
        $newGenre->title = $request->title;
        $newGenre->save();
    }

    public function delete($id){
        $newGenre = Genre::find($id);
        $newGenre->delete();
    }

    public function update($id, Request $request){
        $newGenre = Genre::find($id);
        $newGenre->title = $request->title;
        $newGenre->save();
    }

    public function get($id){
        return Genre::find($id);
    }

    public function list(){
        $newList = Genre::all();
        return $newList;
    }
}
