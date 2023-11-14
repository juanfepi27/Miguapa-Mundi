<?php

//Authors: Miguel Ángel Calvache and Maria Paula Ayala

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['titleTemplate'] = __('admin.index.titleTemplate');

        return view('admin.index')->with('viewData', $viewData);
    }
}