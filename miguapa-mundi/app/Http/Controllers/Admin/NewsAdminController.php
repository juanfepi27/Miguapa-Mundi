<?php

//Authors: Miguel Ángel Calvache and Maria Paula Ayala

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsAdminController extends Controller
{
    public function newsIndex(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('admin.newsIndex.titleTemplate');
        $news = News::all();
        $viewData['news'] = $news;

        return view('admin.news.index')->with('viewData', $viewData);
    }

    public function newsShow(string $id): View
    {
        $viewData = [];
        $news = News::findOrFail($id);
        $viewData['titleTemplate'] = __('admin.newsShow.titleTemplate');
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
        $viewData['titleTemplate'] = __('admin.newsCreate.titleTemplate');

        return view('admin.news.create')->with('viewData', $viewData);
    }

    public function newsSave(Request $request): RedirectResponse
    {
        News::validateCreateform($request);
        News::create($request->only(['title', 'description']));

        return redirect()->route('admin.news.create');
    }
}
