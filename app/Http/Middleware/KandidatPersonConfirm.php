<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KandidatPersonConfirm
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
        if(Auth::user()->roles->first()->name == 'admin-kandidat-free' || Auth::user()->roles->first()->name == 'admin-kandidat-premium'){
            if (empty(Auth::user()->kandidat) ) {
                return redirect(route('createKandidat'));
            }
    
            //jika PERSON/People Belum terisi
            if (Auth::user()->kandidat->persons->isEmpty()) {
                return redirect(route('createPerson'));
            }
    
            //jika kandidat adalah eksekutif {maka perlu wakil}
            if (Auth::user()->kandidat->jenisKandidat->lembaga == 'eksekutif') {
                //jika person hanya satu {jika dia belum punya wakil}
                if (Auth::user()->kandidat->persons->count() == 1) {
                    return redirect(route('createWakilPerson'));
                }
            }
            return $next($request);
        }
        return $next($request);
    }
}
