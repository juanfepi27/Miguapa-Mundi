<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CountryController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Country Page - Miguapa Mundi';
        $viewData['countries'] = Country::with('members.alliance', 'user_owner')->get();

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

        $data = $request->only(['name', 'nick_name', 'color', 'minimum_offer_value', 'attractive_value', 'default_offer_value', 'user_owner_id']);
        $data['flag'] = $flagPath;
        $data['in_offer'] = $request->has('in_offer') ? true : false;

        Country::create($data);
        return redirect()->route('country.index');
    }
}
