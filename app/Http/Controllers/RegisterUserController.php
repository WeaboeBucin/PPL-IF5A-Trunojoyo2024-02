<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('Auth.register-form.form-user');
    }


    public function register_user(Request $request)
    {
        $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'first-name.required' => 'Nama awal wajib diisi',
            'last-name.required' => 'Nama akhir wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        // Create new user
        $user = new User();
        $user->first_name = $request->input('first-name');
        $user->last_name = $request->input('last-name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Redirect to a specific page after successful registration
        Alert::info('User', 'Anda telah registrasi');
        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
}