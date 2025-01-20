<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiKey;

class ApiKeyMiddleware
{
    public function handle($request, Closure $next)
    {
        $apiKey = $request->header('Authorization');

        if (!$apiKey || !ApiKey::where('api_key', $apiKey)->exists()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
