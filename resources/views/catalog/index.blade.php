@extends('layouts.app')

@section('content')
    <h1>Movie Catalog</h1>
    <form method="GET" action="{{ route('catalog.index') }}" style="margin-bottom: 25px;">
        <label for="genre">Filter by genre:</label>
        <select name="genre" id="genre" onchange="this.form.submit()" style="padding:6px; margin-left:10px;">
            <option value="">All genres</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->name }}" {{ $genreName === $genre->name ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
    </form>

    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-top:30px;">
        @forelse($movies as $movie)
            <div style="text-align:center;">
                <a href="{{ route('catalog.show', $movie) }}">
                    <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" style="width:100%; border-radius:6px;">
                </a>
                <div style="margin-top:10px; font-weight:600;">{{ $movie->title }}</div>
            </div>
        @empty
            <p>No movies found for this genre.</p>
        @endforelse
    </div>

    <div style="margin-top:25px; display:flex; justify-content:center;">
        {{ $movies->links() }}
    </div>
@endsection
