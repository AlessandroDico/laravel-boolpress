<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckApiToken
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
        $authorizationToken = $request->header('authorization');
        // dd($request->header('authorization'));
        // verifico se mi passa un qualsiasi valore
        if (empty($authorizationToken)) {
            return response()->json([
                'succes' => false,
                'error' => 'missed or invalid api_token',
            ]);
        };

        $finalApiToken = subStr($authorizationToken, 7);
        $tokenExist = User::where('api_token', $finalApiToken )->first();

        // verifico se mi passa un valore che esiste nel DB
        if (!$tokenExist) {
            return response()->json([
                'succes' => false,
                'error' => 'missed or invalid api_token',
            ]);
        };
        // dd($finalApiToken);
        return $next($request);
    }
}
