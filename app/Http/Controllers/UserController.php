<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index(){

        return view ('auth.login');
    }
    
    
    
    public function auth(Request $request){ 

        $data =  $request->all();
        $remmenber =  isset($data['lembrar']) ? true : false;

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $remmenber)){
            return redirect('/');
        }else{
            return redirect('/login');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    
    
}
