<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        $comments = Comment::with('user_info')
            ->when(request('search'), function ($query, $search) {
                return $query->where('body', 'LIKE', "%$search%");
            })->orderBy('created_at', 'DESC')
            ->paginate(10);

        $totalComments = Comment::count();

        return view('Admin.Komentar.Index', [
            'comments' => $comments,
            'totalComments' => $totalComments,
        ]);
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.komentar.index');
    }
}
