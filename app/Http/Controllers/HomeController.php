<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorite;
use App\Models\Merchant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function home()
    {
        // if (Auth::guard('merchant')->check()) {
        //     return redirect('/merchant');
        // } else {
        //     return view('Homepage');
        // }


        $featured = Product::with('merchant')->where('status', 'tersedia')->orderBy('id', 'DESC')->limit(6)->get();
        $new_merchant = Merchant::limit(4)->orderBy('id', 'DESC')->get();

        return view('Homepage')
            ->with('featured', $featured)
            ->with('new_merchant', $new_merchant);
    }

    public function productDetail($slug)
    {
        $product_detail = Product::getProductBySlug($slug);
        if (!$product_detail) {
            abort(404, 'Product not found');
        }
        $averageRating = $product_detail->average_rating;
        return view('Pages.Postingan-desc')->with('product_detail', $product_detail)->with('averageRating', $averageRating);
    }
    public function merchantDetail($slug)
    {
        $merchant_detail = Merchant::getMerchantBySlug($slug);
        if (!$merchant_detail) {
            abort(404, 'merchant not found');
        }

        $products_paginate = Product::where('merchant_id', $merchant_detail->id)->paginate(4);
        return view('Pages.Merchant-desc')->with('merchant_detail', $merchant_detail)->with('products_paginate', $products_paginate);
    }

    

    public function productGrids(Request $request)
    {
        $products = Product::query();

        // Filter by merchant type
        if ($request->filled('merchant')) {
            $merchants = $request->input('merchant');
            $products->whereHas('merchant', function ($query) use ($merchants) {
                $query->whereIn('type', $merchants);
            });
        }


        // rating
        if ($request->filled('rating')) {
            $rating = $request->input('rating');
            $products->where('rating', '>=', $rating);
        }

        // Filter by price range
        if ($request->filled(['min', 'max'])) {
            $min = $request->input('min');
            $max = $request->input('max');
            $products->whereBetween('price', [$min, $max]);
        }

        // Search logic
        if ($request->filled('search')) {
            $search = $request->input('search');
            $products->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%');
            });
        }

        // Category filter logic
        if ($request->filled('category')) {
            $categories = $request->input('category');
            $products->whereIn('category', $categories);
        }
        // availible filter l
        if ($request->filled('availability')) {
            $availability = $request->input('availability');
            $products->whereIn('status', $availability);
        }

        // Sorting logic
        if ($request->filled('sort')) {
            $sort = $request->input('sort');
            if ($sort == 'terbaru') {
                $products->orderBy('id', 'desc');
            } elseif ($sort == 'terlama') {
                $products->orderBy('id', 'asc');
            }
        }

        // Pagination
        $show = $request->input('show', 6);
        $products = $products->with('merchant')->orderBy('id', 'desc')->paginate($show);

        return view('Pages.Postingan')->with('products', $products);
    }

    public function merchantGrids(Request $request)
    {
        $merchants = Merchant::query();



        // Search logic
        if ($request->filled('search')) {
            $search = $request->input('search');
            $merchants->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhere('owner', 'LIKE', '%' . $search . '%')
                    ->orWhere('address', 'LIKE', '%' . $search . '%');
            });
        }


        // Sorting logic
        if ($request->filled('sort')) {
            $sort = $request->input('sort');
            if ($sort == 'terbaru') {
                $merchants->orderBy('id', 'desc');
            } elseif ($sort == 'terlama') {
                $merchants->orderBy('id', 'asc');
            }
        }

        // Pagination
        $show = $request->input('show', 10);
        $merchants = $merchants->orderBy('id', 'desc')->paginate($show);

        return view('Pages.Merchant')->with('merchants', $merchants);
    }


    public function addToFavourites(Request $request){
        // Validasi request
        $request->validate([
            'productId' => 'required|exists:products,id',
        ]);

        // Ambil user yang sedang login
        $user = Auth::guard('user')->user();

        // Lakukan pengecekan jika user sudah login
        if ($user) {
            // Cek apakah produk sudah ada di favorit user
            $existingFavorite = Favorite::where('user_id', $user->id)
                                    ->where('product_id', $request->productId)
                                    ->first();

            if ($existingFavorite) {
                // Jika produk sudah ada, tampilkan pesan alert atau notifikasi
                return redirect()->back()->with('info', 'Produk ini sudah difavoritkan');
            } else {
                // Simpan ke dalam database
                $favourite = new Favorite();
                $favourite->product_id = $request->productId;
                $favourite->user_id = $user->id;
                $favourite->save();

                // Redirect atau response jika berhasil
                return redirect()->back()->with('success', 'Produk telah ditambahkan ke favorit');
            }
        } else {
            // Redirect atau response jika user belum login
            return redirect()->back()->with('info', 'Silahkan login terlebih dahulu');
        }
    }


    public function soon ()
    {
        Alert::toast('Coming Soon', 'info');
        return redirect()->back();
    }


}
