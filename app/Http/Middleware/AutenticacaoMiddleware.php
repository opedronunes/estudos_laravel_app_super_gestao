<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao)
    {
        //Verifica se o usuario existe-caso sim o next empurra o acesso para a aplicação.
        if (false) {
            return $next($request);  
        }else {
            return Response('Acesso negado, rota exige autenticação!!!');
        }
    }
}
