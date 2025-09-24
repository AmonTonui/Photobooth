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
    public function handle(Request $request, Closure $next):Response
    {
        $u = $request->user();

        if (! $u) {
            return redirect()->route('login');
        }

        // Allow true admin in any of these shapes
        $isAdmin = strtolower((string)($u->role ?? '')) === 'admin'
            || (isset($u->is_admin) && (int) $u->is_admin === 1)
            || (method_exists($u, 'isAdmin') && $u->isAdmin());

        if (! $isAdmin) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
