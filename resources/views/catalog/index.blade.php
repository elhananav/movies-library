@extends('layouts.app')

@section('content')
    <h1 style="text-align:center; margin-bottom:30px;">Movie Catalog</h1>

    <div style="display: grid; grid-template-columns: repeat(4,1fr); gap: 20px; margin-top:30px;">
        @foreach($movies as $movie)
            <div style="text-align:center;">
                <a href="{{ route('catalog.show', $movie) }}">
                    <img src="{{ $movie->poster_url ?: 'https://via.placeholder.com/200x300?text=No+Image' }}"
                         alt="{{ $movie->title }}"
                         style="width:100%; border-radius:6px;">
                </a>
                <div style="margin-top:10px; font-weight:600;">{{ $movie->title }}</div>
            </div>
        @endforeach
    </div>

    <div style="margin-top:25px; display:flex; justify-content:center;">
        {{ $movies->links() }}
    </div>
@endsection
