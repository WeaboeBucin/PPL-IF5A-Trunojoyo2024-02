<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $products = Product::where('merchant_id', Auth::guard('merchant')->user()->id)->get();
        $comments = Comment::whereIn('product_id', $products->pluck('id'))->when(request('search') ?? false, function ($query, $search) {
            return $query->whereAny(['body'], 'LIKE', "%$search%");
        })
            ->paginate(5)
            ->withQueryString();

        return view('Merchant.coment.index', [
            'comments' => $comments,
        ]);
    }

    public function destroy(Request $request, Comment $comment)
    {
        $products = Product::where('merchant_id', Auth::guard('merchant')->user()->id)->get();
        $comment = Comment::whereIn('product_id', $products->pluck('id'))->firstOrFail();

        $comment->delete();

        return redirect()->route('merchant.coment.index');
    }
}
