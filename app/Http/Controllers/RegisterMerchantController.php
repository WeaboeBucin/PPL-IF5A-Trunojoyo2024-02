<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterMerchantController extends Controller
{
    public function index(){
        return view('Auth.register-form.form-merchant');
    }

    public function register_merchants(Request $request)
    {
        $request->validate([
            'nama-toko' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
            'type' => 'required',
            'owner' => 'required',
        ], [
            'nama-toko.required' => 'nama toko wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'address.required' => 'alamat wajib diisi',
            'type.required' => 'tipe wajib diisi',
            'owner.required' => 'owner wajib diisi',
        ]);

        $existingMerchant = Merchant::where('email', $request->input('email'))->first();
        if ($existingMerchant) {
            Alert::info('Merchant', 'Email anda sudah terdaftar');
            return redirect()->back()->withInput();
        }

        // Create new merchant
        $merchant = new Merchant();
        $merchant->name = $request->input('nama-toko');
        $merchant->email = $request->input('email');
        $merchant->password = bcrypt($request->input('password'));
        $merchant->address = $request->input('address');
        $merchant->type = $request->input('type');
        $merchant->owner = $request->input('owner');
        $merchant->save();

        // Redirect ke halaman tertentu setelah berhasil menyimpan data
        Alert::info('Merchant', 'Anda telah registrasi');
        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

}
