<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->type->type_name == 'Admin'){
            $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        }else{
            $posts = Post::where('user_id' ,Auth::user()->user_id)->orderBy('created_at', 'desc')->paginate(5);
        }

        return view('home')->with('posts', $posts);
    }
}
