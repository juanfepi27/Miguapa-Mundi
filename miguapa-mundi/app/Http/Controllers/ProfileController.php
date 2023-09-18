<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('profile.index.titleTemplate');
        $viewData['user'] = $request->user();

        return view('profile.index')->with('viewData', $viewData);
    }

    public function addBudget(Request $request): RedirectResponse
    {
        $user = $request->user();
        if ($user->getBudget() + 5000 <= 2147483647) {
            $user->setBudget($user->getBudget() + 5000);
            $user->save();
            session()->flash('success', __('profile.addBudget.successMsg'));

            return back();
        } else {
            return back()->withErrors(['full budget' => __('profile.addBudget.errorMsg')]);
        }
    }
}
