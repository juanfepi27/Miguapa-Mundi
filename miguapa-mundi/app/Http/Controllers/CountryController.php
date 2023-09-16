<?php

namespace App\Http\Controllers;

use App\Models\Alliance;
use App\Models\Country;
use App\Models\News;
use App\Models\Offer;
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

    public function inOfferIndex(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('country.inOfferIndex.titleTemplate');
        $countries = Country::all()->where('in_offer',1);

        foreach ($countries as $country) {
            $maxOffer = $country->getOffers()->max('price');
            $country->maxOffer = $maxOffer;
        }

        $viewData['countries'] = $countries;

        return view('country.in-offer')->with('viewData', $viewData);
    }

    public function inOfferShow(Request $request,int $id): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Country in offer - Miguapa Mundi';
        //getting the country to show
        $viewData['country'] = Country::findOrFail($id);
        //getting the offers to show (and ordering if required)
        $viewData['offers'] = Offer::where('country_id',$id)->where('status','SENT');
        if($request->input('orderBy')==null)
        {
            $viewData['offers']=$viewData['offers']->get();
        }else
        {
            $viewData['offers']=$viewData['offers']->orderBy($request->input('orderBy'),'desc')->get();
        }
        //getting alliance names if there are
        $viewData['alliances'] = $viewData['country']->getMembers()->map(function ($member) {
            return $member->getAlliance()->getName();
        });
        $finnancialEffects = $viewData['country']->getFinancialEffects();
        if(count($finnancialEffects)>0)
        {
            $viewData['lastNews']=$finnancialEffects->sortByDesc('created_at')->first()->getNews();
        }else
        {
            $viewData['lastNews']=false;
        }

        return view('country.show')->with('viewData', $viewData);
    }
}
