<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Offer;
use App\Models\Country;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferToMe
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

        $country = $offer->getCountry();

        if ( $request->user() != $country->getUserOwner()) {
            abort(403, __('middleware.OfferToMe.errorMsg'));
        }

        return $next($request);
    }
}
