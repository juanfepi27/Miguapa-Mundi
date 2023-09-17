<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Alliance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AllianceController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('alliance.index.titleTemplate');
        $viewData['alliances'] = Alliance::all();
        $user = auth()->user();
        $viewData['userCountries'] = $user->getBoughtCountries();
        
        return view('alliance.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('alliance.create.titleTemplate');
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
        $existingMember = Member::where('alliance_id', $request->input('alliance_id'))->where('country_id', $request->input('country_id'))->exists();
        if($existingMember != null){
            return redirect()->route('alliance.index')->with('success', 'It already exists a relationship between this country and this alliance');
        }

        Member::validate($request);
        Member::create($request->only(['founder', 'moderator', 'alliance_id', 'country_id']));
        
        return redirect()->route('alliance.index')->with('success', 'Your request to become a member was sent successfully');
    }

    public function deleteMember(string $id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return back()->with('success', 'Updated members successfully');
    }

    public function userAlliances(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('alliance.myAlliances.titleTemplate');
        $user = auth()->user();

        $boughtCountries = $user->getBoughtCountries();
        $membersByCountry = [];

        foreach ($boughtCountries as $country) {
            $membersByCountry[$country->getName()] = $country->getMembers();
        };  

        $viewData['alliances_members'] = $membersByCountry;

        
        return view('alliance.my-alliances')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Alliance Details Page - Miguapa Mundi';
        $viewData['alliance'] = Alliance::findOrFail($id);

        return view('alliance.show')->with('viewData', $viewData);
    }

    public function stopModerator(string $id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->setModerator(0);
        $member->save();
        
        return back()->with('success', 'Updated moderators successfully');

    }

    public function becomeModerator(string $id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->setModerator(1);
        $member->save();
        
        return back()->with('success', 'Updated moderators successfully');

    }

    public function acceptMember(string $id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->setIsAccepted(1);
        $member->save();
        
        return back()->with('success', 'Updated members successfully');

    }

    public function declineMember(string $id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->setIsAccepted(0);
        $member->save();
        
        return back()->with('success', 'Updated members successfully');

    }
}
