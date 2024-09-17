<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $field = match(gettype($request->input('username'))) {
            'string' => filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username',
            'integer' => filter_var($request->input('username'), FILTER_VALIDATE_INT) ? 'mobile_phone' : 'username'
        };

        $credentials = [
            $field => $request->input('username'),
            'password' => $request->input('password')
        ];

        $account = User::where($field, $request->input('username'))->first();

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to($this->redirectTo);
        }



    }

}
