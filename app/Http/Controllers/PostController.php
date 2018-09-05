<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;




class PostController extends Controller
{
 /**
 * 
 * @return Response
 */
    public function showposts(){

        $posts = \DB::table('posts')->orderBy('created_at', 'desc')->paginate(5);
        //$count = Post::withCount('comments')->get();
        //return view('Posts/showposts', ['posts' => Post::paginate(5)]);
        return view('Posts/showposts', ['posts' => $posts]);
    }
    

    /**
 * 
 * 
 * @return Response
 */

public function createposts(){
    
        return view('Posts/createposts');
    
    
}
/**
 * 
 * @param Request $request
 * @return Response
 */

    public function storeposts(Request $request){
        
        $user = $request->user()->name;

        if($request->has('id')){
            $post = Post::find($request->id);
            $post->title = $request->title;
            $post->content = $request->content;
        } else {
            $post = new Post;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->author = $user;
        }
        $post->save();
        return redirect('posts');
    }

    /**
     * @param int $id
     * @return Response
     */
    public function editposts($id){
        return view('Posts/editposts', ['post' => Post::findOrFail($id)]);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function removeposts($id){
        Post::destroy($id);
        Comment::where('post_id', $id)->delete();
        return redirect('posts');
    }
    
    /**
     * @param int $id
     * @return Response
     */
    public function show($id){
        
        return view('Posts/show', [
            'post' => Post::findOrFail($id),
            'comments' => Comment::where('post_id', $id)->paginate(5)
         ]);
    }
    

    /**
     * 
     * @param Request $request
     * @return Response
     */

    public function addcomment(Request $request){

        $user = $request->user()->name;
        $id = $request->id;
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->post_id = $request->id;
        $comment->author = $user;
        $comment->save();

        return redirect('/show/'.$id);
        // return view('Posts/show', [
        //     'post' => Post::findOrFail($id),
        //     'comments'=> Comment::where('post_id', $id)->paginate(5)
        // ]);
    }
}


