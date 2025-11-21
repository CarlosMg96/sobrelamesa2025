<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Generar nonce seguro para inline scripts
        Log::debug('🛡️ SecurityHeaders middleware ejecutado para: ' . $request->path());
        $nonce = base64_encode(random_bytes(16));

        // Guardar nonce en el request para poder usarlo en las vistas
        $request->attributes->set('csp_nonce', $nonce);

        $response = $next($request);

        // Aplicar todas las cabeceras de seguridad
        $response->headers->set('Content-Security-Policy', $this->buildCspPolicy($nonce));
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
        $response->headers->remove('X-Powered-By'); // Este puede no existir, pero se intenta quitar

        return $response;
    }

    /**
     * Build the Content Security Policy string
     */
    private function buildCspPolicy(string $nonce): string
    {
        return "default-src 'self'; " .
               "script-src 'self' 'nonce-{$nonce}' https://www.googletagmanager.com https://code.jquery.com https://unpkg.com https://cdnjs.cloudflare.com https://cdn.jsdelivr.net; " .
               "style-src 'self' https://cdnjs.cloudflare.com https://fonts.googleapis.com https://unpkg.com 'unsafe-inline'; " .
               "font-src 'self' https://fonts.gstatic.com; " .
               "img-src 'self' data: https:; " .
               "connect-src 'self' https://www.google-analytics.com; " .
               "object-src 'none';";
    }
}
