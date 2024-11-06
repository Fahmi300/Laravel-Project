<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;


class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('form.login');
        }
    }

    public function actionlogin(Request $request)
    {
        $credential = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credential)) {
            $request->session()->put('is_logged_in', true); // Set session variable for logged-in status
            $request->session()->put('us', Auth::user());


            return redirect()->intended('home'); 
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('is_logged_in'); // Clear session
        $request->session()->forget('user');
        return redirect('/');
    }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/');
    // }
}