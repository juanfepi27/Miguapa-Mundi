<?php

//Author: Maria Paula Ayala

namespace App\Http\Middleware;

use Closure;
use App\Models\Country;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyCountry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $countryId = $request->route("id");
        $country = Country::findOrFail($countryId);

        if ( $request->user() != $country->getUserOwner()) {
            abort(403, __('middleware.MyCountry.errorMsg'));
        }

        return $next($request);
    }
}
