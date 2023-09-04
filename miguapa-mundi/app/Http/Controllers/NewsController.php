<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'News Page - Miguapa Mundi';
        $viewData['news'] = News::paginate(3);

        return view('news.index')->with('viewData', $viewData);
    }

    public function search(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = 'News Page - Miguapa Mundi';
        $viewData['news'] = News::where('title', 'like', '%'.$request->input('search-bar').'%')->paginate(3);

        return view('news.index')->with('viewData', $viewData);
    }
}
