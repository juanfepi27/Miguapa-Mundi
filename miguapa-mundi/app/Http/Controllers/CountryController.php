<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Country Page - Miguapa Mundi';
        $viewData['countries'] = Country::all();

        return view('country.index')->with('viewData', $viewData);
    }


}
