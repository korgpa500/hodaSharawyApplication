<?php

namespace App\Http\Controllers;

use App\Section;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $users = User::get();
        return view('users.index')->with('users',$users);
    }

    function delete($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
    }

    function edit($user_id)
    {
        $sections = Section::get();
        $types = Type::get();
        $user = User::find($user_id);
        return view('users.edit')->with('user', $user)->with('sections', $sections)->with('types', $types);
    }

    function update(Request $request)
    {
        $user = User::find($request->user_id);
        $user->section_id = $request->section_id;
        $user->type_id = $request->type_id;
        $user->save();
        return redirect()->route('users.index');
    }
}
