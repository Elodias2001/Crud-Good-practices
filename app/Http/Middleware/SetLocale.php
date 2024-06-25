<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasCookie('locale')) {
            //A chaque requete Il va regarder si dans la requete il y a un cookie nommé locale qui à partir du moment ou il est setter sera dans le header. Il sera aussi envoyé depuis la requete

            if (is_array($request->cookie('locale')) || is_null($request->cookie('locale'))) {
                $request->cookie('locale', 'en');
            } else {
                app()->setLocale($request->cookie('locale'));
                // Si c'est la condition est vérifiée. Si c'est le cas, on va setter la locale
            }
        }

        return $next($request);
    }
}
