<?php
namespace App\Http\Middleware;

use closure;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role ?? null)!== 'admin') {
            abort(403, 'Unauthorized access - Admins only.');
        }

        return $next($request);
    }
}
