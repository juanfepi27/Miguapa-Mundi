<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LangController extends Controller
{
    public function changeLang(string $locale): RedirectResponse
    {
        if (in_array($locale, ['en', 'es'])) {
            session()->put('locale', $locale);
        }

        return back();
    }
}
