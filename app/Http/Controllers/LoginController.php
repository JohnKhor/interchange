<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $usernameOrEmail = $request->usernameOrEmail;
        $password = $request->password;

        if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
            auth()->attempt(['email' => $usernameOrEmail, 'password' => $password]);
        } else {
            auth()->attempt(['username' => $usernameOrEmail, 'password' => $password]);
        }
        
        if (auth()->check()) {
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'credentials' => 'Please check your credentials and try again.'
        ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
