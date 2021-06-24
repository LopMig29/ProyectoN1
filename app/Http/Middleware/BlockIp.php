<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIp
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
        if(\Auth::user()->email == "admin12@gmail.com" && $request->getRequestUri() == "/employees-vue"){
            return  response('NO tienes permiso para ver esta pagina', 401); 
        }
        return $next($request);
    }
}
