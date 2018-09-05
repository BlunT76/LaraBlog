<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Comment;




class CommentController extends Controller
{

/**
     * 
     * @param Request $request
     * @return Response
     */

    public function addcomment(Request $request){
        
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->post_id = $request->id;
        $comment->author = Auth::user()->name;
        $comment->save();

        return view('Posts/show', [
            'post' => Post::findOrFail($id),
            'comments'=> Post::findOrFail($id)->comments
        ]);
    }
}