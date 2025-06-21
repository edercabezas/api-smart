<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class EnsureApiAuthenticated extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // En una API no queremos redirigir, así que devolvemos null
            return null;
        }
        return null;
    }
}
