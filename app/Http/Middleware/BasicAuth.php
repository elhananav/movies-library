<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuth
{
    public function handle(Request $request, Closure $next)
    {
        $username = env('ADMIN_USER', 'admin');
        $password = env('ADMIN_PASS', 'password');

        if ($request->getUser() !== $username || $request->getPassword() !== $password) {
            $headers = ['WWW-Authenticate' => 'Basic'];
            return response('Unauthorized', 401, $headers);
        }

        return $next($request);
    }
}
