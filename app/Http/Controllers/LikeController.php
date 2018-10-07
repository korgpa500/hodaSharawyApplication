<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($post_id)
    {
        Like::create([
            'post_id' => $post_id,
            'user_id' => Auth::user()->user_id,
        ]);

        return Like::where('post_id', $post_id)->count();
    }
}
