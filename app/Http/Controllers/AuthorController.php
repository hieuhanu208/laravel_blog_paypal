<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePost;
class AuthorController extends Controller
{
    public function __construct(){
        $this->middleware('CheckRole:author');
        $this->middleware('auth');
    }
    public function dashboard(){
      
        //Get collection of posts
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        $allComments = Comment::whereIn('post_id',$posts)->get();
        $commentToday = $allComments->where('created_at', \Carbon\Carbon::today())->count();
        
        return view('author.dashboard',compact('allComments','commentToday'));
    }

    public function comments(){
        $posts = Post::where('user_id', Auth::id())->pluck('id')->toArray();
        $comments = Comment::whereIn('post_id',$posts)->get();
        return view('author.comment', compact('comments'));
    }


    public function posts(){
        return view('author.posts');
    }

    public function newPost(){
        return view('author.newPost');
    }
    
    public function createNewPost(CreatePost $request){
        $post = new Post();
        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();
        return back()->with('success','Create a new post successfully');
    }

     public function editPost($id){
        $post = Post::where('id', $id)->where('user_id',Auth::id())->first();
        return view('author.editPost', compact('post'));
     }

     public function postEditPost(CreatePost $request , $id){
        $post = Post::where('id', $id)->where('user_id',Auth::id())->first();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('authorPosts')->with('success','Updated post successfully');
     }

     public function postDeletePost($id){
        $post = Post::where('id', $id)->where('user_id',Auth::id())->first();
        $post->delete();
        return redirect()->route('authorPosts')->with('success','Deleted post successfully');
     }

}
