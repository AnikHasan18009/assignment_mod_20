<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class GetAllPosts extends Controller
{
    function getPosts()
    {
        $posts=Post::with('category')->get();
        return $posts;
    }
}
