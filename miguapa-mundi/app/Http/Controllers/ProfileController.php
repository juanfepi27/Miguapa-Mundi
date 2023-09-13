<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Profile - Miguapa Mundi';
        $viewData['user']=$request->user();

        return view('profile.index')->with('viewData', $viewData);
    }

    public function addBudget(Request $request): RedirectResponse
    {
        $user = $request->user();
        $user->setBudget($user->getBudget()+5000);
        $user->save();

        session()->flash('success', 'You has added $5.000 to your budget!');
        return back();
    }
}