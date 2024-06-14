<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        if(!auth()->check() || !in_array(auth()->user()->role, ['admin', 'pemilik'])){
            abort(403);
        }
        $izinRole = ['admin','pemilik'];
        if(in_array(auth()->user()->role, $izinRole)){
            return $next($request);
        }
        return redirect('/');
    }
}
