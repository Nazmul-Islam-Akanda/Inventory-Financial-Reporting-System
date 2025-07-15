<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ( Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {
            flash()->success('Login successful!');
            return redirect()->route('admin.dashboard');
        }
        flash()->error('Login failed! Please check your credentials.');
        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        flash()->success('logout successful!');
        return redirect()->route('login');

    }
}
