<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){
      return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request){
      $this->validate($request, [
        'title' => 'required',
        'photo' => 'required|image'
      ]);

      // Get file name with extension
      $filenameWithExt = $request->file('photo')->getClientOriginalName();

      // Get just file name
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

      // Get extension
      $extension = $request->file('photo')->getClientOriginalExtension();

      // Create new filename
      $filenameToStore = $filename . '_' . time() . '.' . $extension;

      // Upload image
      $path= $request->file('photo')->storeAs('public/photos/' . $request->input('album_id'), $filenameToStore);

      // Upload Photo
      $photo = new Photo;
      $photo->album_id = $request->input('album_id');
      $photo->title = $request->input('title');
      $photo->description = $request->input('description');
      $photo->size = $request->file('photo')->getClientSize();
      $photo->photo = $filenameToStore;

      // Save Photo
      $photo->save();

      // Redirect
      return redirect('/albums/'. $request->input('album_id'))->with('smsg', 'Photo Uploaded');
    }

    public function show($id){
      $photo = Photo::find($id);
      return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id){
      $photo = Photo::find($id);
      if (Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)) {
        $photo->delete();
        return redirect('albums/' . $photo->album_id)->with('smsg', 'Photo Deleted');
      }
    }
}
