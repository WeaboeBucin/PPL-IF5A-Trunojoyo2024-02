<?php

namespace App\Http\Controllers\Merchant;

use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class MerchantIndexController extends Controller
{
    public function index()
    {
        $products = Product::where('merchant_id', Auth::guard('merchant')->user()->id)->get();

        return view('Merchant.Index', [
            'products_count' => $products->count(),
            'comments_count' => Comment::whereIn('product_id', $products->pluck('id'))->get()->count(),
        ]);
    }
    public function merchantDetail($slug)
    {
        $merchant_detail = Merchant::getMerchantBySlug($slug);
        if (!$merchant_detail) {
            abort(404, 'merchant not found');
        }

        $products_paginate = Product::where('merchant_id', $merchant_detail->id)->paginate(5);
        return view('Merchant.Pages.Preview-toko')->with('merchant_detail', $merchant_detail)->with('products_paginate', $products_paginate);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',

        ]);

        $merchant = Auth::guard('merchant')->user();

        if (!Hash::check($request->old_password, $merchant->password)) {
            Alert::error('Password lama salah');
            return back()->withErrors(['old_password' => 'Password lama salah']);
        }

        $merchant->password = Hash::make($request->new_password);
        $merchant->save();
        Alert::success('Password berhasil diubah');
        return back()->with('status', 'Password berhasil diubah');
    }


    public function storeLocation(Request $request ,$id)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $merchant = Merchant::findOrFail($id);
        $merchant->latitude = $request->latitude;
        $merchant->longitude = $request->longitude;
        $merchant->save();


        return redirect()->route('merchant.location',$merchant->id)->with('success', 'Lokasi berhasil disimpan!');
    }

    public function showLocationForm($id)
    {
        $merchant = Merchant::findOrFail($id);
        return view('Merchant.edit_profile.EditLokasi')->with('merchant', $merchant);
    }
}
