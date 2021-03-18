<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class SoloDocente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->rol){
            case('administrador'):
                return redirect('administrador');
            break;
            case('docente'):
                return $next($request);
            break;
            case('estudiante'):
                return redirect('alumno');
            break;
        }
    }
}

