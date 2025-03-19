<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $actorsCount = Actor::count();
        $filmsCount = Film::count();
        $categoriesCount = Category::count();

        return view('dashboard', compact('actorsCount', 'filmsCount', 'categoriesCount'));
    }
}