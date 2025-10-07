<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
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
        if (Auth::user()->role!='admin' && Auth::user()->role=='writer') {
            return redirect()->route('writer.books');
        }
        if (Auth::user()->role!='admin' && Auth::user()->role=='member') {
            return redirect()->route('member.books');
        }
        return $next($request);
    }
}
