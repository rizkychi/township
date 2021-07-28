<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function form()
    {
        if (Auth::check()) {
            //Login Success
            return redirect()->route('admin.home');
        }
        return view('public.login');
    }

    public function login(Request $request)
    {
        // validate login info
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!$validated) {
            return 'error';
        }

        // authenticate
        $data = [
            'username'  => $request->input('username'),
            'password'  => $request->input('password')
        ];
 
        Auth::attempt($data);

        if (Auth::check()) {
            //Login Success
            return redirect()->route('admin.home');
        } else {
            //Login Fail
            return back()->with('errors', 'Wrong username or password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
