<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    // for front end show
    public function listAlbums()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    public function showAlbumPhotos(Album $album)
    {
        $album = Album::findOrFail($album->id);
        // $photo = Photo::findOrFail($album->id);

        return view('photos.index', compact('album'));
    }

    // for admin panel
    public function index()
    {
        $albums = Album::all();
        return view('admin.albums.index', compact('albums'));
    }


    public function create()
    {
        return view('admin.albums.create');
    }

    // php artisan storage:link
    public function show(Album $album)
    {
        $album = Album::findOrFail($album->id);
        // $photo = Photo::findOrFail($album->id);

        return view('admin.albums.show', compact('album'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'required|image|max:1999',
            'description' => 'required'
        ]);

        // Get filename with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // dd($filename);

        // Get just extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        // Filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        // Upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers', $fileNameToStore);

        // Create album
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;
        $album->save();

        return redirect('/albums')->with('success', 'Album created');
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect('/albums')->with('success', 'Album deleted');
    }
}
