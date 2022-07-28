<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function view_register_form(){
        return view('register_form');
    }

    public function register_form_save(Request $req){
        $req->validate([
            "username"=>'required',
            "email"=>'required|email|unique:register_users,email',
            "password"=>'required|min:8',
            "dob"=>'required',
            "country"=>'required',
            "city"=>'required',
            "status"=>'required',
        ]);
        $reg = new RegisterUser();
        $reg->username = $req->username;
        $reg->email = $req->email;
        $reg->password = md5($req->password);
        $reg->dob = $req->dob;
        $reg->country = $req->country;
        $reg->city = $req->city;
        $reg->status = $req->status;
        $reg->save();
        return redirect('/');
    }

    public function registerd_users_list(){
        $users = RegisterUser::orderBy('id','desc')->get();
        return view('users_list',compact('users'));
    }

    public function registerd_user_delete($id){
        $user=RegisterUser::where('id',$id)->delete();
        return redirect('/register/users_list')->with('msg','User Deleted Successfully');
    }
}
