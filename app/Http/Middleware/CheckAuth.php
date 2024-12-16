<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/sesi')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return $next($request);
    }
}
?>