<?php

namespace App\Http\Middleware;

use Closure;

class VerificarCapturadorApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user()->id_tipo_usuario != 2)
        {
            return redirect()->route('api.solocapturadores');
        }
        return $next($request);
    }
}
