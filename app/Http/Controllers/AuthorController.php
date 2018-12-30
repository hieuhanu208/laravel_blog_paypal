<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(){
        $this->middleware('CheckRole:author');
    }
    public function dashboard(){
        return view('author.dashboard');
    }

    public function comments(){
        
    }

    public function posts(){
        
    }
    

}
