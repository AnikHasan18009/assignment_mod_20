<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function store(Request $request,$id)
    {
        return  Comment::create([ 'post_id'=>$id, 'content'=>$request->input('content')]);
    }

    function getCommentsByPost(Request $request,$id)
    {
        return Comment::where('post_id',$id)->select('content','created_at')->get();
    }
    function getLatestCommentOfPost(Request $request,$id)
    {
        return Comment::where('post_id',$id)->select('content','created_at')->orderBy('created_at','desc')->first();
    }
}
