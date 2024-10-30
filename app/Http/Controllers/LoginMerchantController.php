<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginMerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:merchant')->except('logout');
    }
    
    public function index()
    {
        return view('Auth.Login'); // Mengubah view ke login
    }

    public function login_merchants(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('merchant')->attempt($credentials)) {
            Alert::toast('Berhasil Login','Success');
            return redirect()->route('merchant.index');
        } else {
            Alert::error('Error', 'Username dan password yang dimasukkan tidak sesuai');
            return redirect()->route('login-merchant')
                ->withErrors(['login' => 'Username dan password yang dimasukkan tidak sesuai'])
                ->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('merchant')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::info('User', 'Anda telah di logout');
        return redirect('/');
    }
}
