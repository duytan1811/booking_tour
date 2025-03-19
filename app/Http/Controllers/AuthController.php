<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('client.auth.login');
    }

    public function loginHandle(Request $request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password']
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()->route('auth.login')->withErrors('Tài khoản hoặc mật khẩu không chính xác');
    }

    public function register()
    {
        return view('client.auth.register');
    }

    public function registerHandle(Request $request)
    {
        $this->validateRegisterForm($request);
        User::create($request->all());

        return redirect()->route('auth.login');
    }

    private function validateRegisterForm(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'signUpTerms' => 'required',
        ], [
            'username.required'       => 'Vui lòng nhập tên tài khoản',
            'first_name.required'       => 'Vui lòng nhập tên',
            'last_name.required'       => 'Vui lòng nhập tên',
            'phone.required'        => 'Vui lòng nhập số điện thoại',
            'phone.numeric'        => 'Giá tour phải là số',
            'email.required'            => 'Vui lòng nhập email',
            'email.email'            => 'Định dạng email không chính xác',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'confirm_password.required'  => 'Vui lòng nhập xác nhận mật khẩu',
            'confirm_password.same'  => 'Mật khẩu không trùng khớp',
            'signUpTerms.required'  => 'Đồng ý với điều khoản và điều kiện ',
        ]);
    }
}
