<?php

namespace App\Http\Controllers;

use App\Models\Alliance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

        return view('alliance.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Alliance::validate($request);

        $image = $request->file('image');
        $imagePath = $image->store('img/images', 'public');

        $data = $request->only(['name', 'image']);
        $data['image'] = $imagePath;

        Alliance::create($data);

        return redirect()->route('alliance.index');
    }
}
