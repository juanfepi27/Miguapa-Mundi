<?php

//Author: Juan Felipe Pinzón

namespace App\Http\Middleware;

use Closure;
use App\Models\Offer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyOffer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $offerId = $request->route("id");
        $offer = Offer::findOrFail($offerId);

        if ( $request->user() != $offer->getUserOfferor() || $offer->getStatus() != "SENT" ) {
            abort(403, __('middleware.MyOffer.errorMsg'));
        }

        return $next($request);
    }
}
