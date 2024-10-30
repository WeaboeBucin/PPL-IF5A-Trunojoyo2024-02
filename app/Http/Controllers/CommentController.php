<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $userId = Auth::id();
        $productId = $request->input('product_id');

        // Periksa apakah pengguna sudah mengomentari produk ini
        $existingComment = Comment::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();

        if ($existingComment) {
            Alert::info('Comment', 'Anda sudah pernah memberikan komentar pada produk ini.');
            return redirect()->back()->withErrors(['comment' => 'Anda sudah memberikan komentar pada produk ini.']);
        }

        Comment::create([
            'body' => $request->input('body'),
            'rating' => $request->input('rating'),
            'product_id' => $productId,
            'user_id' => $userId,
        ]);
        Alert::success('Comment', 'Berhasil');
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
