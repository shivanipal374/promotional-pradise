<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        if($request->email == 'admin@gmail.com' && $request->password == '123456'){
            session(['admin' => true]);
            return redirect('/admin/dashboard');
        }
        return back()->with('error','Invalid Credentials');
    }

    public function logout(){
        session()->forget('admin');
        return redirect('/admin/login');
    }
}
