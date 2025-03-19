<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function loginHandle(Request $request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password']
        ];

        if (!Auth::attempt($credentials)) {
            return redirect()->route('admin.login')->withErrors('Tài khoản hoặc mật khẩu không chính xác');
        }

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return view('admin.auth.login');
    }
}
