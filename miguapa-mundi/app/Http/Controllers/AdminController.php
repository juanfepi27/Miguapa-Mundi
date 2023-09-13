<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\News;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Admin Miguapa Mundi';

        return view('admin.index')->with('viewData', $viewData);
    }

    public function countryIndex(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Country list - Admin Miguapa Mundi';
        $viewData['countries'] = Country::all();

        return view('admin.country.index')->with('viewData', $viewData);
    }

    public function countryShow(string $id): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Country - Admin Miguapa Mundi';
        $viewData['country'] = Country::findOrFail($id);

        return view('admin.country.show')->with('viewData', $viewData);
    }

    public function countryUpdate(Request $request): RedirectResponse
    {
        return redirect()->route('admin.country.index');
    }

    public function countryDelete(Request $request): RedirectResponse
    {
        return redirect()->route('admin.country.index');
    }

    public function countryCreate(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'Create country - Admin Miguapa Mundi';
        $viewData['users'] = User::all();

        return view('admin.country.create')->with('viewData', $viewData);
    }

    public function countrySave(Request $request): RedirectResponse
    {
        Country::validate($request);

        $flag = $request->file('flag');
        $flagPath = $flag->store('img/flags', 'public');

        $countryData = $request->only(['name', 'nick_name', 'color', 'minimum_offer_value', 'attractive_value', 'default_offer_value', 'user_owner_id']);
        $countryData['flag'] = $flagPath;
        $countryData['in_offer'] = $request->has('in_offer') ? true : false;

        Country::create($countryData);
        return redirect()->route('admin.country.create');
    }

    public function newsIndex(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'News list - Admin Miguapa Mundi';
        $news = News::all();
        $viewData['news'] = $news;

        return view('admin.news.index')->with('viewData', $viewData);
    }

    public function newsShow(string $id): View
    {
        $viewData = [];
        $news = News::findOrFail($id);
        $viewData['titleTemplate'] = 'News list - Admin Miguapa Mundi';
        $viewData['news'] = $news;

        return view('admin.news.show')->with('viewData', $viewData);
    }

    public function newsUpdate(Request $request): RedirectResponse
    {
        $news = News::find($request['id']);
        $news->setTitle($request['title']);
        $news->setDescription($request['description']);
        $news->save();

        return redirect()->route('admin.news.index');
    }

    public function newsDelete(Request $request): RedirectResponse
    {
        $news = News::find($request['id']);
        $news->financialEffects()->delete();
        $news->forceDelete();

        return redirect()->route('admin.news.index');
    }

    public function newsCreate(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'News list - Admin Miguapa Mundi';

        return view('admin.news.create')->with('viewData', $viewData);
    }

    public function newsSave(Request $request): RedirectResponse
    {
        News::validateCreateform($request);
        News::create($request->only(['title', 'description']));

        return redirect()->route('admin.news.create');
    }
}
