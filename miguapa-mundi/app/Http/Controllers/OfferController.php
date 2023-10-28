<?php

//Author: Juan Felipe Pinzón 

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OfferController extends Controller
{
    public function toMe(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('offer.toMe.titleTemplate');
        $countries = $request->user()->getBoughtCountries()->pluck('name');
        $viewData['offers'] = Offer::whereHas('country', function ($query) use ($countries) {
            $query->whereIn('name', $countries);
        })->where('status', 'SENT');

        if ($request->input('orderBy') == null) {
            $viewData['offers'] = $viewData['offers']->get();
        } else {
            $viewData['offers'] = $viewData['offers']->orderBy($request->input('orderBy'), 'desc')->get();
        }

        return view('offer.to-me')->with('viewData', $viewData);
    }

    public function byMe(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('offer.byMe.titleTemplate');

        if ($request->input('orderBy') == null) {
            $viewData['offers'] = $request->user()->getSentOffers();
        } else {
            $viewData['offers'] = $request->user()->getSentOffers()->sortByDesc($request->input('orderBy'));
        }

        return view('offer.by-me')->with('viewData', $viewData);
    }

    public function create(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('offer.new.titleTemplate');
        $userCountries = $request->user()->getBoughtCountries()->pluck('name');
        $viewData['countries'] = Country::all()->reject(function ($country) use ($userCountries) {
            return in_array($country->getName(), $userCountries->toArray());
        });

        return view('offer.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $userOfferorId = $request->user()->getId();
        $status = 'SENT';
        $request = $request->merge(['user_offeror_id' => $userOfferorId]);
        $request = $request->merge(['status' => $status]);
        $country = Country::findOrFail($request->input('country_id'));
        session()->flash('country_id', $country->getId());  
        session()->flash('country_name', $country->getName());  
        Offer::validate($request, $country->getMinimumOfferValue());
        Offer::create($request->only('status', 'price', 'country_id', 'user_offeror_id'));

        session()->flash('success', __('offer.new.successMsg'));

        return back();
    }

    public function accept(Request $request, int $id): RedirectResponse
    {
        $offer = Offer::findOrFail($id);
        $country = $offer->getCountry();
        $userOwner = $request->user(); //actual owner
        $userOfferror = $offer->getUserOfferor(); //actual offeror
        if ($offer->getPrice() > $userOfferror->getBudget()) {
            return back()->withErrors(['no budget' => __('offer.accept.errorMsg')]);
        }

        //updating new owner
        $userOfferror->setBudget($userOfferror->getBudget() - $offer->getPrice());
        $userOfferror->save();
        $country->setUserOwnerId($userOfferror->getId());
        $country->save();
        //updating old owner
        $userOwner->setBudget($userOwner->getBudget() + $offer->getPrice());
        $userOwner->save();
        //rejecting the other offers
        $otherOffers = $country->getOffers();
        foreach ($otherOffers as $otherOffer) {
            if ($otherOffer->getStatus() == 'SENT') {
                $otherOffer->setStatus('REJECTED');
                $otherOffer->save();
            }
        }
        //updating offer
        $offer->setStatus('ACCEPTED');
        $offer->save();

        session()->flash('success', __('offer.accept.successMsg'));

        return back();
    }

    public function reject(int $id): RedirectResponse
    {
        $offer = Offer::findOrFail($id);
        //updating offer
        $offer->setStatus('REJECTED');
        $offer->save();

        session()->flash('success', __('offer.reject.successMsg'));

        return back();
    }

    public function delete(int $id): RedirectResponse
    {
        Offer::destroy($id);
        session()->flash('success', __('offer.delete.successMsg'));

        return back();
    }
}
