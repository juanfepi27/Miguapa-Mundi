<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    public function save(Request $request): RedirectResponse
    {
        Member::validate($request);

        Member::create($request->only(['founder', 'moderator', 'alliance_id', 'country_id']));
        
        return redirect()->route('alliance.index');
    }
}
