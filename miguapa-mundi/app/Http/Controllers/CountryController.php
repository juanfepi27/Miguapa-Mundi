<?php

//Authors: Juan Felipe Pinzón and Maria Paula Ayala

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\News;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('country.index.titleTemplate');
        $viewData['countries'] = Country::all();
        $viewData['searchCountry'] ='';
        $viewData['lastNews'] = News::orderBy('created_at', 'desc')->first()['title'];

        return view('country.index')->with('viewData', $viewData);
    }

    public function search(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('country.index.titleTemplate');
        $viewData['countries'] = Country::all();;
        $viewData['searchCountry'] = Country::where('name', 'like', '%'.$request->input('search-bar').'%')->first();
        $viewData['lastNews'] = News::orderBy('created_at', 'desc')->first()['title'];

        return view('country.index')->with('viewData', $viewData);
    }

    public function inOfferIndex(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('country.inOfferIndex.titleTemplate');
        $countries = Country::all()->where('in_offer', 1);

        foreach ($countries as $country) {
            $country->setMaxOffer($country);
        }
        $viewData['countries'] = $countries;

        return view('country.in-offer')->with('viewData', $viewData);
    }

    public function inOfferShow(Request $request, int $id): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('country.inOfferShow.titleTemplate');
        //getting the country to show
        $viewData['country'] = Country::findOrFail($id);
        //getting the offers to show (and ordering if required)
        $viewData['offers'] = Offer::where('country_id', $id)->where('status', 'SENT');
        if ($request->input('orderBy') == null) {
            $viewData['offers'] = $viewData['offers']->get();
        } else {
            $viewData['offers'] = $viewData['offers']->orderBy($request->input('orderBy'), 'desc')->get();
        }
        //getting alliance names if there are
        $viewData['alliances'] = $viewData['country']->getMembers()->filter(function ($member) {
            return $member->getIsAccepted();
        })->map(function ($member) {
            return $member->getAlliance()->getName();
        });
        $finnancialEffects = $viewData['country']->getFinancialEffects();
        if (count($finnancialEffects) > 0) {
            $viewData['lastNews'] = $finnancialEffects->sortByDesc('created_at')->first()->getNews();
        } else {
            $viewData['lastNews'] = false;
        }

        return view('country.show')->with('viewData', $viewData);
    }

    public function myCountriesIndex(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('country.myCountriesIndex.titleTemplate');
        $user = auth()->user();
        $countries = $user->getBoughtCountries();

        foreach ($countries as $country) {
            $maxOffer = $country->getOffers()->where('status', 'SENT')->max('price');
            $maxOfferFormatted = number_format($maxOffer, 0, ',', '.');
            $country->maxOffer = $maxOfferFormatted;
        }

        $viewData['countries'] = $countries;

        return view('country.my-countries')->with('viewData', $viewData);
    }

    public function myCountriesShow(int $id): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('country.myCountriesShow.titleTemplate');
        $viewData['country'] = Country::findOrFail($id);

        return view('country.my-countries-show')->with('viewData', $viewData);
    }

    public function myCountriesUpdate(Request $request): RedirectResponse
    {
        $country = Country::find($request['id']);
        $country->setNickName($request['nick_name']);
        $country->setColor($request['color']);
        if ($request->file('flag')) {
            $flag = $request->file('flag');
            $flagPath = $flag->store('img/flags', 'public');
            $country->setFlag($flagPath);
        }
        $country->setInOffer($request->has('in_offer') ? true : false);
        $country->update();

        return redirect()->route('country.myCountriesIndex');
    }

    public function showMap(): View
    {
        $countries = Country::all();
        $countriesNames = array();
        foreach ($countries as $country) {
           array_push($countriesNames, $country->getName());
        }
        return view('country.map')->with('countriesNames', $countriesNames);
    }
}
