<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'News Page - Miguapa Mundi';
        $viewData['news'] = News::paginate(3);

        return view('news.index')->with('viewData', $viewData);
    }

    public function search(Request $request): View | RedirectResponse
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'News Page - Miguapa Mundi';

        $viewData['news'] = News::where('title', 'like', '%'.$request->input('search-bar').'%')
        ->orwhereHas('financialEffects', function ($query) use ($request) {
            $query->whereHas('country', function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->input('search-bar').'%');
            });
        })
        ->paginate(3)
        ->appends(['search-bar' => $request->input('search-bar')]);

        return view('news.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $news = News::findOrFail($id);
        $viewData['titleTemplate'] = ($news->getTitle()).' - Miguapa Mundi';
        $viewData['news'] = $news;
        $viewData['countries'] = $news->financialEffects->map(function ($financialEffect) {
            return $financialEffect->country;
        });

        return view('news.show')->with('viewData', $viewData);
    }
}
