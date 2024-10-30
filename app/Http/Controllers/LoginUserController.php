<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Log;


class LoginUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:user,merchant')->except('logout');
    }

    public function index()
    {
        return view('Auth.Login');
    }

    public function login_users(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'user_type' => 'required|in:user,merchant'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'user_type.required' => 'Tipe pengguna wajib dipilih',
            'user_type.in' => 'Tipe pengguna tidak valid'
        ]);

        $guard = $request->input('user_type');
        $credentials = $request->only(['email', 'password']);

        // Log guard and credentials for debugging
        Log::info('Attempting login', [
            'guard' => $guard,
            'credentials' => $credentials
        ]);

        $check = Auth::guard($guard)->attempt($credentials);

        if ($check) {
            // Redirect based on the user type
            Alert::toast('Berhasil Login','Success');
            Log::info('Login successful', ['guard' => $guard]);

            if ($guard == 'user') {
                return redirect('/');
            } else {
                return redirect('/');
            }
        } else {
            Log::warning('Login failed', [
                'guard' => $guard,
                'credentials' => $credentials
            ]);
            return redirect('/login')
                ->withErrors(['login' => 'Username dan password yang dimasukkan tidak sesuai'])
                ->withInput();
        }
    }

    public function logout(Request $request)
    {

        $userType = $request->input('user_type', 'user');

        Auth::guard($userType)->logout();


        $request->session()->invalidate();
        Alert::info('User', 'Anda telah di logout');

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
