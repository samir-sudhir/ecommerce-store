<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RequestLog;
use Illuminate\Support\Facades\DB;

class LogRequestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Store request data
        $log = RequestLog::create([
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'request_data' => json_encode($request->all()),
        ]);

        // Process the request
        $response = $next($request);

        // Update the log with the response status and data after the request is handled
        $log->update([
            'status_code' => $response->getStatusCode(),
            'response_data' => $response->getContent(),
        ]);

        return $response;
    }
}
