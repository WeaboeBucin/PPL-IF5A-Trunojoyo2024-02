<?php

namespace App\Http\Controllers\Admin;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostinganController extends Controller
{
    public function index()
    {
        

        
        $products = Product::when(request('search') ?? false, function ($query, $search) {
            return $query->where('name', 'LIKE', "%$search%");
        })  ->withCount('comments')
            ->paginate(10)
            ->withQueryString();    
        
            $totalProducts = Product::count();

        return view('Admin.Products.Index', [
            'products' => $products,
            'totalproducts' => $totalProducts,

        ]);
    }

    // // Show the form for creating a new resource.
    // public function create()
    // {
    //     return view('admin.products.create');
    // }

    // Store a newly created resource in storage.
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'category' => 'required|string|max:255',
    //         'price' => 'required|integer',
    //         'rating' => 'nullable|numeric|min:0|max:5',
    //         'status' => 'required|string',
    //         'photo' => 'nullable|string',
    //         'merchant_id' => 'required|integer|exists:merchants,id',
    //     ]);

    //     Product::create($request->all());

    //     return redirect()->route('products.index')->with('success', 'Product created successfully.');
    // }

    // Display the specified resource.
    // public function show(Product $product)
    // {
    //     return view('admin.products.show', compact('product'));
    // }



    // Update the specified resource in storage.
    // public function update(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'category' => 'required|string|max:255',
    //         'price' => 'required|integer',
    //         'rating' => 'nullable|numeric|min:0|max:5',
    //         'status' => 'required|string',
    //         'photo' => 'nullable|string',
    //         'merchant_id' => 'required|integer|exists:merchants,id',
    //     ]);

    //     $product->update($request->all());

    //     return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    // }

    // Remove the specified resource from storage.
    public function destroy(Product $product)
    {

        $product->comments()->delete();
        $product->favorites()->delete();
        $product->delete();
        
        return redirect()->route('admin.products.index')->with('success', 'Product has been deleted successfully.');
    }
}
