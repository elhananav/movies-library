<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request): View
    {
        $genreName = $request->query('genre');

        $query = Movie::query()->with('genres');

        if ($genreName) {
            $query->whereHas('genres', function ($q) use ($genreName) {
                $q->where('name', $genreName);
            });
        }

        $movies = $query->latest()->paginate(12)->withQueryString();
        $genres = Genre::orderBy('name')->get();

        return view('catalog.index', compact('movies', 'genres', 'genreName'));
    }

    public function show(Movie $movie): View
    {
        return view('catalog.show', compact('movie'));
    }
}
