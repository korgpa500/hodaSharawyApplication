<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|min:3',
            'post_body' => 'required|min:10',
            'post_image' => 'image|max:2084',
        ]);


        $path = "";
        /*if ($request->post_image != "") {
            $path = $request->post_image->store('avatars/posts', 'public');
        }*/

        if ($request->post_image != "") {
            $path = time() . '.' . $request->post_image->getClientOriginalExtension();
            $request->post_image->move(public_path('uploads/posts') ,$path);
        }

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_body = $request->post_body;
        $post->post_image = $path;
        $post->user_id = Auth::user()->user_id;
        $post->section_id = $request->section_id;

        $post->save();


        return redirect()->back();
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        //Storage::disk('myDriver')->delete($post->post_image);
        if($post->post_image != ""){
            unlink(public_path('uploads/posts') . '/' .$post->post_image);
        }
        $post->likes()->forceDelete();
        $post->delete();

        return redirect()->back();
    }
}
