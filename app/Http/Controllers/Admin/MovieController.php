<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use App\Services\MovieImportService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(): View
    {
        $movies = Movie::query()->latest()->paginate(20);
        return view('admin.movies.index', compact('movies'));
    }

    public function create(): View
    {
        $prefill = session('prefill', []);

        return view('admin.movies.create', [
            'prefill' => $prefill,
        ]);
    }

    public function store(MovieRequest $request): RedirectResponse
    {
        $movie = Movie::query()->create($request->validated());

        $genreNames = $request->input('genre_names', []);

        if (!empty($genreNames)) {
            $genreIds = [];

            foreach ($genreNames as $name) {
                $genre = Genre::firstOrCreate(['name' => $name]);
                $genreIds[] = $genre->id;
            }

            $movie->genres()->sync($genreIds);
        }

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

    public function importForm(): View
    {
        return view('admin.movies.import');
    }

    public function import(Request $request, MovieImportService $importService): View|RedirectResponse
    {
        $request->validate([
            'query' => 'required|string'
        ]);

        $query = $request->input('query');
        $data = $importService->fetch($query);

        if (!$data) {
            return back()->with('error', 'Movie not found or API error.');
        }

        return redirect()
            ->route('admin.movies.create')
            ->with('prefill', $data);
    }
}
