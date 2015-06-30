<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Models\OauthClient;

class ClientMiddleware
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
        if (OauthClient::find($request->input('client_id'))) {
            
            $data = OauthClient::find($request->input('client_id'))->pluck('secret');

            if ($data != $request->input('client_secret')) {

                if ($request->ajax())
                {
                    return response('Unauthorized.', 401);
                }
                else
                {
                    return response()->json(['error' => 401, 'error_description' => 'Missing credential']);
                }
            } else {

                return $next($request);
            }
        }

        return response()->json(['error' => 401, 'error_description' => 'Missing credential']);
    }
}
