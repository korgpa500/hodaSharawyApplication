<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuggestionRequest;
use App\Section;
use App\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{

    function store(SuggestionRequest $request)
    {
        $section = Section::where('section_name',$request->section_name)->first();
        $sectionAdmin = Section::where('section_name' ,'Admin')->first();
        Suggestion::create([
            'title' => $request->title,
            'sender_name'=>$request->sender_name,
            'sender_email'=>$request->sender_email,
            'sender_message'=>$request->sender_message,
            'section_id'=> ($request->section_name == 'general') ? $sectionAdmin->section_id : $section->section_id,
            'read' => 0,
        ]);

        return redirect()->back()->with('message', 'suggestion');
    }
}
