<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function login(){
        return view('user.login');
    }

    public function authenticate(Request $request){
       //dd($request->all());

        if (Auth::attempt(['email' => $request->email, 
        'password'=> $request->password])){
            return redirect()->route('user.profile');
        }

    
    }

    public function register(){
        return view('user.register');
    }

    public function saveuser(Request $request){
        $request['photo_path']='';
        //call the user model
        User::create($request->all());

        return redirect()->route('user.login');
    }

    public function profile(){
        return view('user.profile');
   

    }
    


}
