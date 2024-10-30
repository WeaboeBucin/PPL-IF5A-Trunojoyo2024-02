<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class GlobalChatController extends Controller
{
    public function index()
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Mengambil semua pesan chat bersama dengan pengirimnya (sender)
        $messages = Chat::with('sender')
        ->where(function ($query) use ($user) {
            $query->where('sender_type', 'App\Models\User')
                  ->orWhere('sender_type', 'App\Models\Merchant');
        })
        ->orderBy('created_at', 'desc')  // Ambil 30 pesan terbaru
        ->limit(30)
        ->get()
        ->sortBy('created_at');
        
        return view('Pages.Global-chat', compact('messages'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();
        $senderType = get_class($user);

        // Menyimpan pesan baru ke dalam database
        Chat::create([
            'body' => $request->body,
            'sender_id' => $user->id,
            'sender_type' => $senderType,
        ]);

        Alert::toast('Pesan terkirim', 'success');
        return redirect()->route('global');
    }

    public function storeMerchant(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        // Mendapatkan pengguna yang sedang login (Merchant)
        $merchant = Auth::guard('merchant')->user();

        // Menyimpan pesan baru ke dalam database dengan tipe pengirim 'App\Models\Merchant'
        Chat::create([
            'body' => $request->body,
            'sender_id' => $merchant->id,
            'sender_type' => 'App\Models\Merchant',
        ]);

        Alert::toast('Pesan terkirim', 'success');
        return redirect()->route('merchant.global');
    }
}
