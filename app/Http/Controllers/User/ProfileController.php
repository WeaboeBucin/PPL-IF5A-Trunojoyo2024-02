<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('User.Index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|max:2048',
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        // if ($request->hasFile('photo')) {
        //     $path = $request->file('photo')->store('public/photos');
        //     $user->photo = basename($path);
        // }

        $user->save();

        return redirect()->route('user.index')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',

        ]);

        $user = Auth::guard('user')->user();

        if (!Hash::check($request->old_password, $user->password)) {
            Alert::error('Password lama salah');
            return back()->withErrors(['old_password' => 'Password lama salah']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        Alert::success('Password berhasil diubah');
        return back()->with('status', 'Password berhasil diubah');
    }

    public function updatePhoto(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);
    
        // Hapus foto lama jika ada
        if ($user->photo) {
            Storage::delete('public/' . $user->photo);
        }
    
        // Menggunakan nama asli file
        $file = $request->file('photo');
        $fileName = 'photos/' . $file->getClientOriginalName();
    
        // Memastikan nama file unik untuk menghindari konflik
        $path = $file->storeAs('public', $fileName);
    
        $user->photo = $fileName; // Menyimpan path lengkap ke database
    
        $user->save();
    
        // Bersihkan cache view
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        
        Alert::success('Photo updated successfully!');
        return redirect()->back()->with('success', 'Photo updated successfully!');
    }
    
    public function deletePhoto()
    {
        $user = Auth::user();
    
        // Hapus foto jika ada
        if ($user->photo) {
            Storage::delete('public/photos/' . $user->photo);
            $user->photo = null;
            $user->save();
        }
    
        // Set user ke Auth untuk memastikan data terbaru
        Auth::setUser($user);
    
        // Bersihkan cache view
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
    
        Alert::success('Photo deleted successfully!');
        return redirect()->back()->with('success', 'Photo deleted successfully!');
    }

}
