<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsWriter
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
        if (Auth::user()->role!='writer' && Auth::user()->role=='admin') {
            return redirect()->route('home');
        }
        if (Auth::user()->role!='writer' && Auth::user()->role=='member') {
            return redirect()->route('member.books');
        }
        return $next($request);
    }
}
