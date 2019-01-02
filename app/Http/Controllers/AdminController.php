<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CreatePost;
use App\Comment;
use App\User;
use App\Http\Requests\UserUpdate;


class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('CheckRole:admin');
        $this->middleware('auth');
    }

    public function dashboard(){
        return view('layouts.admin.dashboard');
    }

    public function adminEditPost($id){
        $posts = Post::where('id', $id)->first();
        return view('layouts.admin.editPost',compact('posts'));
    }
    
    public function adminPostEditPost(CreatePost $request ,$id){
        $post = Post::where('id', $id)->first();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('adminPosts')->with('success','Updated post successfully');
    }
   
    public function adminDeletePost($id){
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect()->route('adminPosts')->with('success','Deleted post successfully');
    }

    public function posts(){
        $posts = Post::all();
        return view('layouts.admin.posts',compact('posts'));
    }

    public function comments(){
        $comments = Comment::all();
        return view('layouts.admin.comment',compact('comments'));
    }
    
    public function deleteComments($id){
        $comments = Comment::where('id', $id)->first();
        $comments->delete();
        return redirect()->route('adminPosts')->with('success','Deleted comments successfully');
    }

    public function users(){
        $users = User::all();
        return view('layouts.admin.users',compact('users'));
    }

    public function editUser($id){
        $users = User::where('id', $id)->first();
        return view('layouts.admin.editUser',compact('users'));
    }

    public function postEditUser(UserUpdate $request, $id){

        $users = User::where('id', $id)->first();
        
        
        $users->name = $request->name;
        
        $users->email = $request->email;

        if($request->admin == 1){
            $users->admin = true;
        } else{
            $users->admin = false; 
        }
        if($request->author == 1){
            $users->author = true;
        } else{
            $users->author = false; 
        }
    
        $users->save();

        return back()->with('success','Updated users successfully');
    }

    public function deleteUser($id){
        $users = User::where('id', $id)->first();
        $users->delete();
    }
}
