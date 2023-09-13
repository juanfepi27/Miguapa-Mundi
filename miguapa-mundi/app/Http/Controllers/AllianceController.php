<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Country;
use App\Models\Alliance;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AllianceController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Alliance Page - Miguapa Mundi';
        $user = auth()->user();
        $userAlliances = $user->getBoughtCountries()->flatMap(function($country){
            return $country->getMembers()->pluck('alliance_id');
        });

        $viewData['alliances'] = Alliance::all()->reject(function($alliance) use ($userAlliances){
            return in_array($alliance->getId(), $userAlliances->toArray());
        });
        
        return view('alliance.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Create alliance - Miguapa Mundi';
        $user = auth()->user();
        $viewData['userCountries'] = $user->getBoughtCountries();

        return view('alliance.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Alliance::validate($request);

        $image = $request->file('image');
        $imagePath = $image->store('img/images', 'public');

        $allianceData = $request->only(['name', 'image']);
        $allianceData['image'] = $imagePath;

        $alliance = Alliance::create($allianceData);
        $allianceId = $alliance->getId();

        $memberData = $request->only('founder', 'moderator', 'country_id');
        $memberData['alliance_id'] = $allianceId;
        $memberData['is_accepted'] = 1;
        Member::create($memberData);

        return redirect()->route('alliance.index')->with('success', 'Your alliance was created successfully');
    }

    public function saveMember(Request $request): RedirectResponse
    {
        Member::validate($request);

        Member::create($request->only(['founder', 'moderator', 'alliance_id', 'country_id']));
        
        return redirect()->route('alliance.index')->with('success', 'Your request to become a member was sent successfully');
    }

    public function deleteMember(string $id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('alliance.member')->with('success', 'Got out of alliance successfully');
    }

    public function listMembers(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Alliance Member Page - Miguapa Mundi';
        $user = auth()->user();

        $boughtCountries = $user->getBoughtCountries();
        $membersByCountry = [];

        foreach ($boughtCountries as $country) {
            $membersByCountry[$country->getName()] = $country->getMembers()->where('moderator', 0);
        };  

        $viewData['alliances_members'] = $membersByCountry;

        
        return view('alliance.member')->with('viewData', $viewData);
    }

}
