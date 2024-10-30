<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('Admin.Index', [
            'users_count' => User::all()->count(),
            'merchants_count' => Merchant::all()->count(),
            'products_count' => Product::all()->count(),
        ]);
    }
}
