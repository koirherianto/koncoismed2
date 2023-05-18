<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmKandidatConfirm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->hasRole('admin-kanddiat-free')){
            if (Auth::user()->relawan->count() > 1) {
                return redirect(route('relawanpenuh'));
            }
            return $next($request);
        }
        if(Auth::user()->hasRole('relawan-free')){
            if (Auth::user()->relawan->count() > 1) {
                return redirect(route('relawanpenuh'));
            }
            return $next($request);
        }

        return $next($request);
    } 
}