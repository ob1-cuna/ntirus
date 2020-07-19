<?php

namespace App\Http\Middleware;

use App\habilidade;
use Closure;

class CheckPerfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        $permission = explode('|', $permission);

        
        if(checkPerfil($permission)){
            return $next($request);
        }

        $habilidades = Habilidade::all();
        return response()->view('paginas_extras.perfil_cadastro', compact('habilidades'));
    }
}
