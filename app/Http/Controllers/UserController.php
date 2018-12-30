<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdate;
use App\Comment;

class UserController extends Controller
{


    public function dashboard(){
        return view('user.dashboard');
    }

    public function comments(){
        
        return view('user.comment');
    }

    public function deleteComments($id){
        $comments = Comment::where('id', $id)->where('user_id',Auth::id())->delete();
        

        return back();

    }

    public function profile(){
        return view('user.profile');
    }

   public function postprofile(UserUpdate $request) {
      $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();
    return back();
   }
}