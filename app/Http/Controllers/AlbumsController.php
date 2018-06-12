<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
      $albums = Album::with('Photos')->get();
      return view('albums.index')->with('albums', $albums);
    }

    public function create(){
      return view('albums.create');
    }

    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'cover_image' => 'required|image'
      ]);

      // Get file name with extension
      $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

      // Get just file name
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

      // Get extension
      $extension = $request->file('cover_image')->getClientOriginalExtension();

      // Create new filename
      $filenameToStore = $filename . '_' . time() . '.' . $extension;

      // Upload image
      $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

      // Create Album
      $album = new Album;
      $album->name = $request->input('name');
      $album->description = $request->input('description');
      $album->cover_image = $filenameToStore;

      // Save Album
      $album->save();

      // Redirect
      return redirect('/albums')->with('smsg', 'Album Created Successfuly');

    }

    public function show($id){
      $album = Album::with('Photos')->find($id);
      return view('albums.show')->with('album', $album);
    }
}
