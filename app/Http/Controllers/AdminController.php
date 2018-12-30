<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('CheckRole:admin');
    }

    public function dashboard(){
        return view('layouts.admin.dashboard');
    }
    public function comments(){
        
    }

    public function posts(){
        
    }
    
}
