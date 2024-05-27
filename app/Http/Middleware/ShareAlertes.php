<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use App\Models\Alerte;

class ShareAlertes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $alertes = Alerte::where('status', 'acceptée')
            ->where('created_at', '>=', now()->subHours(48))
            ->orderBy('created_at', 'desc')
            ->get();

        View::share('alertes', $alertes);

        return $next($request);
    }
}
