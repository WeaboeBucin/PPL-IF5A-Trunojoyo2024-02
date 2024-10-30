<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FavouriteController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $show = $request->input('show', 6);

        // Dapatkan favorit user dengan produk dan merchant
        $favorites = Favorite::where('user_id', $userId)
                             ->with('product.merchant')
                             ->paginate($show);

        // Mengubah koleksi produk dari favorit
        $products = $favorites->getCollection()->map(function ($favorite) {
            return $favorite->product;
        });

        // Membuat paginasi baru untuk produk
        $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator(
            $products,
            $favorites->total(),
            $favorites->perPage(),
            $favorites->currentPage(),
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('User.Pages.favourite', [
            'products' => $paginatedProducts,
        ]);
    }

    public function addToWishlist(Request $request){
        // Lakukan pengecekan jika user sudah login
        if (!Auth::guard('user')->check()) {
            Alert::info('User', 'Silahkan login terlebih dahulu');
            return redirect('/postingan');
        }

        // Ambil user yang sedang login
        $user = Auth::guard('user')->user();

        // Ambil product_id dari request
        $product_id = $request->input('product_id');

        // Check if the product is already in the wishlist
        $existingFavorite = Favorite::where('user_id', $user->id)
                                    ->where('product_id', $product_id)
                                    ->first();

        if ($existingFavorite) {
            Alert::info('User', 'Produk ini sudah difavoritkan');
            return redirect('/postingan');
        }

        // Simpan ke dalam database
        Favorite::create([
            'user_id' => $user->id,
            'product_id' => $product_id
        ]);

        Alert::success('User', 'Produk telah ditambahkan ke favorit');
        return redirect()->back();
    }


    public function removeFromWishlist(Request $request){
        $user_id = Auth::id();
        $product_id = $request->input('product_id');
    
        // Cek apakah user sudah login
        if (!$user_id) {
            Alert::info('User', 'Silahkan login terlebih dahulu');
            return redirect('/postingan');
        }
    
        // Cari record favorit berdasarkan user_id dan product_id
        $favorite = Favorite::where('user_id', $user_id)
                            ->where('product_id', $product_id)
                            ->first();
    
        // Jika tidak ditemukan, beri alert dan redirect
        if (!$favorite) {
            Alert::info('User', 'Produk ini tidak ada dalam favorit');
            return redirect('/postingan');
        }
    
        // Hapus record favorit
        $favorite->delete();
        Alert::success('User', 'Produk telah dihapus dari favorit');
        return redirect()->back();
    }
    

    

}
