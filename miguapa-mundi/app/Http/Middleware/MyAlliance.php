<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Alliance;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyAlliance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $allianceId = $request->route("id");
        $alliance = Alliance::findOrFail($allianceId);

        $userCountries = $request->user()->getBoughtCountries();
        $allianceMembers = $alliance->getMembers();

        foreach ($allianceMembers as $member){
            if($member->getModerator()){
                $allianceModerators[] = $member->getCountryId();
            }
        }

        $foundModerator = false;

        foreach ($userCountries as $userCountry) {
            if (in_array($userCountry->getId(), $allianceModerators)) {
                $foundModerator = true;
                break;
            }
        }

        if ( $foundModerator == false ) {
            abort(403, __('middleware.MyAlliance.errorMsg'));
        }

        return $next($request);
    }
}
