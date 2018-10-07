<?php

namespace App\Http\Controllers;

use App\Event;
use App\Photo;
use App\Post;
use App\Section;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function welcome(){
        $sections = Section::where('section_name','!=','Admin')->get();
        return view('welcome')->with('sections' ,$sections);
    }
    function eventsShow(){
        $events = Event::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.events')->with('events' ,$events);
    }

    function kgView(){
        $section = Section::where('section_name' ,'K.G')->first();

        $section_id = $section->section_id;

        $events = Event::where('section_id' ,$section_id)->paginate(5);
        $photos = Photo::where('section_id' ,$section_id)->paginate(5);
        $posts = Post::where('section_id' ,$section_id)->paginate(5);
        return view('pages.kg')->with('events' ,$events)->with('posts' ,$posts)->with('photos' ,$photos);
    }

    function juniorView(){
        $section = Section::where('section_name' ,'Junior')->first();

        $section_id = $section->section_id;

        $events = Event::where('section_id' ,$section_id)->paginate(5);
        $photos = Photo::where('section_id' ,$section_id)->paginate(5);
        $posts = Post::where('section_id' ,$section_id)->paginate(5);
        return view('pages.junior')->with('events' ,$events)->with('posts' ,$posts)->with('photos' ,$photos);

    }

    function middleView(){
        $section = Section::where('section_name' ,'Middle')->first();

        $section_id = $section->section_id;

        $events = Event::where('section_id' ,$section_id)->paginate(5);
        $photos = Photo::where('section_id' ,$section_id)->paginate(5);
        $posts = Post::where('section_id' ,$section_id)->paginate(5);
        return view('pages.middle')->with('events' ,$events)->with('posts' ,$posts)->with('photos' ,$photos);

    }

    function seniorView(){
        $section = Section::where('section_name' ,'Senior')->first();

        $section_id = $section->section_id;

        $events = Event::where('section_id' ,$section_id)->paginate(5);
        $photos = Photo::where('section_id' ,$section_id)->paginate(5);
        $posts = Post::where('section_id' ,$section_id)->paginate(5);
        return view('pages.senior')->with('events' ,$events)->with('posts' ,$posts)->with('photos' ,$photos);

    }

    function blogView(){
        $sections = Post::all()->sortBy('section_id')->groupBy('section_id');
        return view('pages.blog')->with('sections', $sections);
    }

    function showBlog($section_id)
    {
        //$posts = Post::where('section_id', $section_id)->get();
        $posts = Post::where('section_id' ,$section_id)->orderBy('created_at', 'desc')->get();
        return view('pages.blogShow')->with('posts', $posts);
    }
}
