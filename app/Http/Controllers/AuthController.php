<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'admin_id' => ['required'],
            'admin_password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt(['user_id' => $credentials['admin_id'], 'password' => $credentials['admin_password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'admin_id' => '아이디 또는 비밀번호가 잘못되었습니다.',
        ])->onlyInput('admin_id');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', '성공적으로 로그아웃되었습니다.');
    }
}
