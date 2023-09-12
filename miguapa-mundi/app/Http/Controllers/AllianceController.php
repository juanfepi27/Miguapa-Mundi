<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use App\Models\Alliance;
use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AllianceController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Alliance Page - Miguapa Mundi';
        $viewData['alliances'] = Alliance::all();

        return view('alliance.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Create alliance - Miguapa Mundi';
        $viewData['countries'] = Country::all();

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
        $allianceId = $alliance->id;

        $memberData = $request->only('founder', 'moderator', 'country_id', 'alliance_id');
        $memberData['alliance_id'] = $allianceId;
        $member = Member::create($memberData);

        $member->setAttribute('is_accepted', 1);
        $member->save();


        return redirect()->route('alliance.index');
    }

}
