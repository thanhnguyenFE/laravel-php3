<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.index')->with('success', 'Đăng nhập thành công');
        }
        return back()->withErrors([
            'error' => 'Email hoặc mật khẩu không đúng',
        ]);
    }

    public function logout()
    {
        if(auth()->check()){
            auth()->logout();
        }
        return redirect()->route('admin.login');
    }
}
