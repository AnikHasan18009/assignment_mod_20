<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    function getAllPosts()
    {
       $posts=Post::all();
        return $posts;
    }
    function index()
    {
        $posts=Post::all();
        return view('posts',compact('posts'));
    }

    function getPostById(Request $request,$id)
    {
        $post=Post::find($id);
        return view('single-post',compact('post'));
    }
}
