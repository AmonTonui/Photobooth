<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        // Read Eloquent attributes safely
        $role        = $user->getAttribute('role');        
        $isAdminFlag = (bool) ($user->getAttribute('is_admin') ?? false);
        $viaMethod   = method_exists($user, 'isAdmin') ? (bool) $user->isAdmin() : false;

        $ok = $isAdminFlag || $viaMethod || in_array($role, ['admin', 'staff'], true);

        abort_unless($ok, 403, 'Unauthorized access');

        return $next($request);
    }
}
