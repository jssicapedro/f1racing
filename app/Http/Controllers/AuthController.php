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
            $user = Auth::user();
    
            if ($user->isAdmin) {
                return redirect()->route('admin.calendar');
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}