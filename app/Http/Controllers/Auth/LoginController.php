<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    

    public function __construct()
    {
    
        //$this->middleware('authvendedor',['except'=>['postLogin']]);
    }

   
    public function guest(){
        return view('login.login');
    }
    public function postLogin(Request $request)
    {   
        
        //$credentials = $request->only('email', 'password');
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
       
        if (auth()->attempt($credentials)) {
            return redirect()
            ->route('home');
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {   
       
        auth()->logout();
        return redirect()
        ->route('home');
    }
}
