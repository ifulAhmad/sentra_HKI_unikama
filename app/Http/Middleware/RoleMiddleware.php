<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (auth()->user()->role !== $roles[0]) {
            abort(403);
        }
        $user = Auth::user();
        $roles = is_array($roles[0]) ? $roles[0] : $roles;
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }
        return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}
