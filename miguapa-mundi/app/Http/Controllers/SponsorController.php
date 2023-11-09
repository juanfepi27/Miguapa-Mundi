<?php

//Author: Juan Felipe Pinzón 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class SponsorController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('sponsor.index.titleTemplate');
        $viewData['motorcyclesInfo'] = Http::get("https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0")->json();

        return view('sponsor.index')->with('viewData', $viewData);
    }
}
