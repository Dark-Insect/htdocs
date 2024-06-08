<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

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
                //return redirect(RouteServiceProvider::HOME);
                if (auth()->user()->role === 'admin') {
                    return redirect(route('admin.member.index')); // Redirect to admin dashboard
                } elseif(auth()->user()->role === 'member') {
                    return redirect(route('member.mail.index')); // Redirect to user dashboard
                }elseif(auth()->user()->role === 'staff'){
                    return redirect(route('staff.interface'));
                }
            }
        }

        return $next($request);
    }
}
