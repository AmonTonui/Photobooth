<?php
namespace App\Http\Middleware;

use closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class AdminOnly
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next):Response
    {
        $u = $request->user();
        $ok = $u && (
            (property_exists($u, 'role') && $u->role === ['admin', 'staff']) ||
            (property_exists($u, 'is_admin') && (int)$u->is_admin === 1) ||
            (method_exists($u, 'isAdmin') && $u->isAdmin())
        );

        abort_unless($ok, 403, 'Unauthorized access');

        return $next($request);
    }
}
