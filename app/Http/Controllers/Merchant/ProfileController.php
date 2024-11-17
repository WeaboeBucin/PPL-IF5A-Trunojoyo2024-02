<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('Merchant.edit_profile.index', [
            'merchant' => Auth::guard('merchant')->user(),
        ]);
    }

    public function update(Request $request)
    {
        $merchant = Auth::guard('merchant')->user();

        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('merchants')->ignore($merchant->id)],
            'description' => ['required'],
            'address' => ['required'],
            'logo' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'],
            'cover' => ['nullable', 'file', 'mimes:jpg,png', 'max:2048'],
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = 'logo/' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $validated['logo'] = $fileName;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $fileName = 'cover/' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $validated['cover'] = $fileName;
        }

        $merchant->update($validated);

        return redirect()->route('merchant.edit_profile.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
