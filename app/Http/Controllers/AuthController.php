<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin(Request $request)
    {
        if ($request->session()->get('is_admin') === true) {
            return redirect()->route('admin');
        }
        return view('login');
    }

    /**
     * Handle authentication attempt.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $adminUser = config('auth.admin.username', env('ADMIN_USERNAME', 'admin'));
        $adminPass = config('auth.admin.password', env('ADMIN_PASSWORD', 'admin'));

        if ($request->input('username') === $adminUser && $request->input('password') === $adminPass) {
            $request->session()->put('is_admin', true);
            $request->session()->regenerate();
            return redirect()->route('admin');
        }

        return back()->withErrors([
            'login_error' => 'Geçersiz kullanıcı adı veya şifre.',
        ])->withInput($request->only('username'));
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
