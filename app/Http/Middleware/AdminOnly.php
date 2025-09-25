<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        $u = $request->user();
        if (! $u) return redirect()->route('login');

        $ok = (
            (isset($u->role) && in_array($u->role, ['admin', 'staff'], true)) ||
            (isset($u->is_admin) && (int) $u->is_admin === 1) ||
            (method_exists($u, 'isAdmin') && $u->isAdmin())
        );

        abort_unless($ok, 403, 'Unauthorized access');
        return $next($request);
    }
}
