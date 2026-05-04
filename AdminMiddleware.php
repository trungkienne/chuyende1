<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // ❌ chưa đăng nhập
        if (!Auth::check()) {
            return redirect('/login');
        }

        // ❌ không phải admin
        if (Auth::user()->role !== 'admin') {
            abort(403); // chặn
        }

        // ✅ là admin → cho vào
        return $next($request);
    }
}