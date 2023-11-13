<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\JsonResponse;

class CountryApiController extends Controller
{
    public function inOffer(): JsonResponse
    {
        $countries = CountryResource::collection(Country::all()->where('in_offer', 1));
        return response()->json($countries, 200);
    }
}
