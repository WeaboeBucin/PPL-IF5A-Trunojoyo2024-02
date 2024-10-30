<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Merchant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard('merchant')->check()) {
            return $next($request);
        }elseif(Auth::guard('admin')->check()){
            return redirect('/admin')->withErrors('anda bukan merchant');
        }

        return redirect('/')->withErrors('anda bukan merchant');
    }
}
