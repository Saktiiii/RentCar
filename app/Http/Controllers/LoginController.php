<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email harus diisi',
            'email.email'=>'Format @Email tidak valid',
            'password.required'=>'Password harus diisi',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('home');
        }
 
        return back()->withErrors([
            'email' => 'Autentication failed.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    } 
    

    
}
