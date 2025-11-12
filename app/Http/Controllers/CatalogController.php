<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogIndexRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Contracts\View\View;

class CatalogController extends Controller
{
    public function index(CatalogIndexRequest $request): View
    {
        $genreName = $request->validated()['genre'] ?? null;

        $movies = Movie::with('genres')
            ->when($genreName, fn($query) => $query->whereHas('genres', fn($q) => $q->where('name', $genreName)))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $genres = Genre::orderBy('name')->get();

        return view('catalog.index', compact('movies', 'genres', 'genreName'));
    }

    public function show(Movie $movie): View
    {
        return view('catalog.show', compact('movie'));
    }
}
