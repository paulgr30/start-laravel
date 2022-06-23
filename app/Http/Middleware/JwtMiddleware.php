<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use PHPOpenSourceSaver\JWTAuth\Http\Middleware\BaseMiddleware;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['status' => 'Token invalido']);
        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException $e) {
            return throw $e;
        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['status' => 'Token de autorizacion no encontrado']);
        }
        return $next($request);
    }
}
