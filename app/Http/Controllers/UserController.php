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

    public function userinfo(){
        
        return view ('auth.userinfo');
    }

    public function auth(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'As credenciais inseridas estão incorretas.',
        ]);
    }

    
    
    
    

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    
    
}
