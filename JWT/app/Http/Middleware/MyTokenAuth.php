<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\utils\TokenUtil;


class MyTokenAuth
{
    protected $tokenDI; //$tokenUtill 토큰유틸DI

    public function __construct(TokenUtil $tokenUtil) {
        $this->tokenDI = $tokenUtil;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $this->tokenDI->chkToken($request->bearerToken());
        return $next($request);
    }
}
