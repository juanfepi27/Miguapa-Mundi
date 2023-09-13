<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function create(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Create country - Miguapa Mundi';
        $viewData['users'] = User::all();

        return view('country.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Country::validate($request);

        $flag = $request->file('flag');
        $flagPath = $flag->store('img/flags', 'public');

        $countryData = $request->only(['name', 'nick_name', 'color', 'minimum_offer_value', 'attractive_value', 'default_offer_value', 'user_owner_id']);
        $countryData['flag'] = $flagPath;
        $countryData['in_offer'] = $request->has('in_offer') ? true : false;

<<<<<<< HEAD
        Country::create($countryData);
=======
        Country::create($data);

>>>>>>> main
        return redirect()->route('country.index');
    }
}
