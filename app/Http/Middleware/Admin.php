<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }elseif(Auth::guard('merchant')->check()){
            return redirect('/merchant')->withErrors('anda bukan admin');
        }

        return redirect('/')->withErrors('anda bukan admin');
    }
}
