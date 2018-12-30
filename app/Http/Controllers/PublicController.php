<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class PublicController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('welcome',compact('posts'));
    }

    public function singlePost($id){
        $posts = Post::find($id);
        return view('singlePost',compact('posts'));
    }

     public function about(){
        return view('about');
    }

    public function contact(){
        return view ('contact');
    }
}
