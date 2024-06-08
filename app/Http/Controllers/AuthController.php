<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect()->route('admin.dashboard');
        } else {
            // Authentication failed
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function dash()
    {
        return view('auth/dash');
    }
}