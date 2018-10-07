<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Section;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    function index()
    {
        $sections = Photo::all()->sortBy('section_id')->groupBy('section_id');
        return view('photos.index')->with('sections', $sections);
    }

    function show($section_id)
    {
        $photos = Photo::where('section_id', $section_id)->get();
        return view('photos.show')->with('photos', $photos);
    }

    function create()
    {
        $sections = Section::where('section_name', '!=', 'Admin')->get();
        return view('photos.create')->with('sections', $sections);
    }

    function delete($id)
    {
        $photo = Photo::find($id);
        //Storage::disk('myDriver')->delete($photo->img_url);
        unlink(public_path('uploads/photos') . '/' .$photo->img_url);
        $photo->delete();
    }

    function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'img_url' => 'required|image|max:2048'
        ], [
            'img_url.max' => 'the file too large',
        ]);

        //$path = $request->file('img_url')->store('avatars/gallery' ,'public');

        $path = time() . '.' . $request->img_url->getClientOriginalExtension();

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->user_id,
            'section_id' => $request->section_id,
            'img_url' => $path,
        ]);

        $request->img_url->move(public_path('uploads/photos') ,$path);

        return redirect()->back()->with('upload_image', 'IT WORKS!');

    }
}
