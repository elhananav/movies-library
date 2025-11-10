<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
    public function index(): View
    {
        $movies = Movie::query()->latest()->paginate(20);
        return view('admin.movies.index', compact('movies'));
    }

    public function create(): View
    {
        return view('admin.movies.create');
    }

    public function store(MovieRequest $request): RedirectResponse
    {
        Movie::query()->create($request->validated());
        return redirect()->route('admin.movies.index')
            ->with('success', 'Movie created!');
    }

    public function edit(Movie $movie): View
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(MovieRequest $request, Movie $movie): RedirectResponse
    {
        $movie->update($request->validated());
        return redirect()->route('admin.movies.index')
            ->with('success', 'Movie updated!');
    }

    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();
        return redirect()->route('admin.movies.index')
            ->with('success', 'Movie deleted');
    }
}
