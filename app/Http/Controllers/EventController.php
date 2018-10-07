<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //
    function index(){
        $events = Event::orderBy('created_at', 'desc')->paginate(5);
        return view('events.index')->with('events' ,$events);
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_title' => 'required|min:3',
            'event_body' => 'required|min:10',
            'event_image' => 'image|max:2084',
        ]);


        $path = "";

        if ($request->event_image != "") {
            $path = time() . '.' . $request->event_image->getClientOriginalExtension();
            $request->event_image->move(public_path('uploads/events'), $path);
        }

        $event = new Event();
        $event->event_title = $request->event_title;
        $event->event_body = $request->event_body;
        $event->event_image = $path;
        $event->user_id = Auth::user()->user_id;
        $event->section_id = $request->section_id;

        $event->save();


        return redirect()->back();
    }

    public function destroy($event_id)
    {
        $event = Event::find($event_id);
        if($event->event_image != ""){
            unlink(public_path('uploads/events') . '/' .$event->event_image);
        }
        $event->delete();

        return redirect()->back();
    }
}
