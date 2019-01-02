<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdate;
use App\Comment;

class UserController extends Controller
{
    public function __construct(){
        
       return $this->middleware('auth');
    }

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

    if($request['password'] != ""){
        if(!(\Hash::check($request['password'], Auth::user()->password))){
            return redirect()->back()->with('error','The current password is not match');
        }

        if(\strcmp($request['password'],$request['new_password']) ==0){
            return redirect()->back()->with('error','The new password can not  be the same with the current password'); 
        }

        $valadate = $request->validate([
            "password" => 'required',
            "new_password" => 'required|string|min:6|confirmed',
        ]);

        $user->password = \bcrypt($user->new_password);
        $user->save();
        return redirect()->back()->with('success','Updated password successfully!');
    }
    return back();
   }
}
