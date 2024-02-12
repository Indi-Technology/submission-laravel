<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function index(){
        return view('blog.login')->with(['title' => 'Login']);
    }

    public function authenticate(Request $request) {
        $otentikasi = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',   
        ], [
            'email.required' => 'email must be filled in..',
            'email.email' => 'email must be valid..',
            'password.required' => 'password must be filled in..',
        ]);

        if (Auth::attempt($otentikasi)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('Failed', 'email or password wrong' );

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
