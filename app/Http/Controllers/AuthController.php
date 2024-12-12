<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // Attempt login
        if (Auth::attempt($request)) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            return redirect()
                ->intended('/') // Redirect ke halaman dashboard atau home
                ->with('success', 'Login successful!');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
         // Buat pengguna baru
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login
        return redirect()->route('auth.loginForm')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        Auth::logout();

        // Redirect ke halaman login
        return redirect()->route('auth.loginForm')->with('success', 'Bye bye.');
    }
}
