<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role!='member' && Auth::user()->role=='admin') {
            return redirect()->route('home');
        }
        if (Auth::user()->role!='member' && Auth::user()->role=='writer') {
            return redirect()->route('writer.books');
        }
        return $next($request);
    }
}
