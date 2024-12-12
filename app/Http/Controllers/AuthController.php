<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        // Attempt login
        if (Auth::attempt($credentials)) {
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
        $this->service->store($request);

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
