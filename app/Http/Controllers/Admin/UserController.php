<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::when(request('search') ?? false, function ($query, $search) {
            return $query->whereAny(['first_name', 'last_name'], 'LIKE', "%$search%");
        })
            ->paginate(5)
            ->withQueryString();

        return view('Admin.Users.Index', [
            'users' => $users,
        ]);
    }

    public function edit(User $user)
    {
        return view('Admin.Users.Edit', [
            'user' => User::findOrFail($user->id),
        ]);
    }

    public function updatePassword(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => ['required', 'min:8', 'max:100'],
            'password_confirmation' => ['required', 'min:8', 'max:100', 'same:password'],
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.edit', ['user' => $user->id])->with(
            'success',
            'Password berhasil diubah.'
        );
    }

    public function destroy(User $user)
    {
        $user->favorites()->delete();
        $user->comments()->delete();
        $user->chats()->delete();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
