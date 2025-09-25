<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CompanyContext
{
    public function handle(Request $request, Closure $next)
    {
        // Example: set company_id in the session or context
        if (auth()->check() && auth()->user()->company_id) {
            app()->instance('company', auth()->user()->company);
        }

        return $next($request);
    }
}
