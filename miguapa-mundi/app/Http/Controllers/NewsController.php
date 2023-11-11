<?php

//Author: Miguel Ángel Calvache

namespace App\Http\Controllers;

use App\Interfaces\newsGenerator;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    protected $newsGenerator;

    public function __construct(newsGenerator $newsGenerator)
    {
        $this->newsGenerator = $newsGenerator;
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('news.index.titleTemplate');
        $viewData['news'] = News::paginate(3);

        return view('news.index')->with('viewData', $viewData);
    }

    public function search(Request $request): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('news.index.titleTemplate');

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
        $viewData['countries'] = $news->getFinancialEffects()->map(function ($financialEffect) {
            return [$financialEffect->getCountry(), $financialEffect->getEffectFormatted()];
        });

        return view('news.show')->with('viewData', $viewData);
    }

    public function create(): string
    {
        $type = 'api';
        $this->newsGenerator = app()->makeWith(newsGenerator::class, ['type' => $type]);
        $this->newsGenerator->generate();
        
        return 'OK';
    }
}