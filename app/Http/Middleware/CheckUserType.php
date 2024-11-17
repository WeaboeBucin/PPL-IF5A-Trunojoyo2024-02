<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle($request, Closure $next, $type)
    {
        $user = Auth::user();

        // Periksa apakah pengguna sesuai dengan tipe yang diberikan
        if ($user && get_class($user) == $type) {
            return $next($request);
        }

        // Jika tidak sesuai, redirect atau beri response yang sesuai
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
