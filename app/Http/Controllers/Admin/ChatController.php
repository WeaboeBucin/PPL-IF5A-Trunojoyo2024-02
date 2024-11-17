<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::with('sender')->when(request('search'), function ($query, $search) {
                return $query->where('body', 'LIKE', "%$search%");
            })
            ->paginate(10);

        $totalChats = Chat::count();

        return view('Admin.Chat.Index', [
            'chats' => $chats,
            'totalChats' => $totalChats,
        ]);
    }

    public function destroy(Chat $chat)
    {
        $chat->delete();
        return redirect()->route('admin.global-chat.index');
    }
}
