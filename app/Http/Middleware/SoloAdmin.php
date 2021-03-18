<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class SoloAdmin
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
                return $next($request);
            break;
            case('docente'):
                return redirect('docente');
            break;
            case('estudiante'):
                return redirect('alumno');
            break;
        }
    }
}
