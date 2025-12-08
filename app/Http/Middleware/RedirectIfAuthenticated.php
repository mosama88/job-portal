<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'admin') {
                    return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD);
                } elseif (Auth::user()->role === 'company') {
                    return redirect()->intended(RouteServiceProvider::COMPANY_DASHBOARD);
                } elseif (Auth::user()->role === 'candidate') {
                    return redirect()->intended(RouteServiceProvider::CANDIDATE_DASHBOARD);
                }
            }
        }
        return $next($request);
    }
}
