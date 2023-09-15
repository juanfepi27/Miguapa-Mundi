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

    public function inOfferShow(int $id): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Country in offer - Miguapa Mundi';
        $viewData['country'] = Country::findOrFail($id);
        $viewData['offers'] = Offer::where('country_id',$id)->where('status','SENT')->get();
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
