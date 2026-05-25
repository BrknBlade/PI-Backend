<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class ForceCrossSiteCookies
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Let the request execute normally and get the response
        $response = $next($request);

        // 2. Intercept all outgoing cookies and force SameSite=None and Secure
        foreach ($response->headers->getCookies() as $cookie) {
            $response->headers->setCookie(
                Cookie::create(
                    $cookie->getName(),
                    $cookie->getValue(),
                    $cookie->getExpiresTime(),
                    $cookie->getPath(),
                    $cookie->getDomain(),
                    true,     // Force Secure = true
                    false,    // httpOnly (keep whatever Laravel set)
                    false,    // raw
                    'None'    // Force SameSite = 'None'
                )
            );
        }

        return $response;
    }
}
