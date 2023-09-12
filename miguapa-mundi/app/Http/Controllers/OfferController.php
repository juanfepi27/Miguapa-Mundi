<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Offer;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class OfferController extends Controller
{
    public function toMe(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'My Offers - Miguapa Mundi';
        $countries=$request->user()->getBoughtCountries()->pluck('name');
        $viewData['offers'] = Offer::whereHas('country', function ($query) use ($countries) {
            $query->whereIn('name', $countries);
        })->where('status','SENT')->get();

        return view('offer.to-me')->with('viewData', $viewData);
    }
    
    public function byMe(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Offers By Me - Miguapa Mundi';
        $viewData['offers'] = $request->user()->getSentOffers();

        return view('offer.by-me')->with('viewData', $viewData);
    }
    
    public function create(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Create Offer - Miguapa Mundi';
        $userCountries = $request->user()->getBoughtCountries()->pluck('name');
        $viewData['countries'] = Country::all()->reject(function($country) use ($userCountries){
            return in_array($country->getName(), $userCountries->toArray());
        });

        return view('offer.create')->with('viewData', $viewData);
    }
    
    public function save(Request $request): RedirectResponse
    {
        $userOfferorId=$request->user()->getId();
        $status='SENT';
        $request=$request->merge(['user_offeror_id'=>$userOfferorId]);    
        $request=$request->merge(['status'=>$status]);
        $country=Country::findOrFail($request->input('country_id'));
        Offer::validate($request,$country->getMinimumOfferValue());
        Offer::create($request->only('status','price','country_id','user_offeror_id'));

        session()->flash('success', 'Created Offer!');

        return back();
    }
    
    public function accept(Request $request, int $id): RedirectResponse
    {
        $offer=Offer::findOrFail($id);
        $country=$offer->getCountry();
        $userOwner=$request->user();//actual owner
        $userOfferror=$offer->getUserOferror();//actual offeror
        if($offer->getPrice()>$userOfferror->getBudget()){
            return back()->withErrors(['no budget'=>'Sorry! the offeror doesn\'t have enough budget to buy your country']);
        }
        //updating offer
        $offer->setStatus("ACCEPTED");
        $offer->save();
        //updating new owner
        $userOfferror->setBudget($userOfferror->getBudget()-$offer->getPrice());
        $userOfferror->save();
        $country->setUserOwnerId($userOfferror->getId());
        $country->save();
        //updating old owner
        $userOwner->setBudget($userOwner->getBudget()+$offer->getPrice());
        $userOwner->save();

        session()->flash('success', 'You sold correctly your country!');
        return back();
    }
    
    public function reject(int $id): RedirectResponse
    {
        $offer=Offer::findOrFail($id);
        //updating offer
        $offer->setStatus("REJECTED");
        $offer->save();

        session()->flash('success', 'You rejected correctly an offer!');
        return back();
    }
    
    public function delete(int $id): RedirectResponse
    {
        Offer::destroy($id);
        return back();
    }
}
