<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class OfferController extends Controller
{
    public function toMe(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'My Offers - Miguapa Mundi';
        //nonfinal
        $userId=1;
        $viewData['offers'] = Offer::where('user_offeror_id',$userId)->where('status','SENT')->get();
        //endnonfinal

        return view('offer.to-me')->with('viewData', $viewData);
    }
    
    public function byMe(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Offers By Me - Miguapa Mundi';
        //nonfinal
        $viewData['offers'] = Offer::all();
        //endnonfinal

        return view('offer.by-me')->with('viewData', $viewData);
    }
    
    public function create(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Create Offer - Miguapa Mundi';

        return view('offer.create')->with('viewData', $viewData);
    }
    
    public function save(Request $request): RedirectResponse
    {
        // $user_offeror_id=$request->user()->getId();
        $user_offeror_id=1;
        $status='SENT';
        $request=$request->merge(['user_offeror_id'=>$user_offeror_id]);    
        $request=$request->merge(['status'=>$status]);
        Offer::validate($request);
        Offer::create($request->only('status','price','country_id','user_offeror_id'));

        session()->flash('success', 'Created Offer!');

        return back();
    }
    
    public function accept(int $id): RedirectResponse
    {
        return back();
    }
    
    public function reject(int $id): RedirectResponse
    {
        return back();
    }
    
    public function delete(int $id): RedirectResponse
    {
        Offer::destroy($id);
        return back();
    }
}
