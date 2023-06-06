<?php

namespace Modules\SmartCARSNative\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\SmartCARSNative\Models\SmartCARS3Session;

/**
 * Class SCAuth
 * @package Modules\SmartCARSNative\Http\Middleware
 */
class SCHeaders
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
        $method = $request->method();
        //dd($method);
        if ($method === 'OPTIONS' || $method === 'HEAD')
        {
            $response = response()->json(null);
        }
        else {
            $response = $next($request);
        }
        //dd($response);
        $response->withHeaders([
            'Content-type' => 'application/json',
            'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS, HEAD',
            'Access-Control-Allow-Headers' => 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With',
            'Access-Control-Allow-Origin' => '*'
        ]);
        return $response;

    }
}
