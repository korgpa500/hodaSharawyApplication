<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    function index(){
        $sections = Section::get();
        return view('sections.index')->with('sections' ,$sections);
    }

    function store(Request $request){
        Section::create([
            'section_name' => $request->section_name,
        ]);
        return redirect()->route('sections.index');
    }

    function show($section_id){
        $oneSection = Section::find($section_id);
        $sections = Section::get();
        return view('sections.index')->with('sections' ,$sections)->with('oneSection',$oneSection);
    }

    function edit(Request $request ,$section_id){
        $section = Section::find($section_id);
        $section->section_name = $request->section_name;
        $section->update();
        return redirect()->route('sections.index');
    }

    function destroy($section_id){
        Section::where('section_id',$section_id)->delete();
        return redirect()->route('sections.index');
    }
}
