<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Contracts\View\View;

class CatalogController extends Controller
{
    public function index(): View
    {
        $movies = Movie::latest()->paginate(12);
        return view('catalog.index', compact('movies'));
    }

    public function show(Movie $movie): View
    {
        return view('catalog.show', compact('movie'));
    }
}
