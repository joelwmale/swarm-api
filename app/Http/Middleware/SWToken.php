<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Swarm\Auth\ApiToken;

class SWToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->header('apiToken')) {
            $token = ApiToken::where('token', trim($request->header('apiToken')))->first();

            if (!$token) {
                return response()->json(['errors' => 'Invalid or incorrect api token'], 401);
            }

            // Log user in for this request
            Auth::onceUsingId($token->user->id);

            return $next($request);
        }

        return response()->json(['errors' => 'Invalid or incorrect api token'], 401);
    }
}
