@extends('layouts.app')

@section('content')
    <div style="max-width:600px; margin:40px auto; text-align:center;">
        <h1 style="margin-bottom:20px;">{{ $movie->title }}</h1>

        <img src="{{ $movie->poster_url ?: 'https://via.placeholder.com/300x450?text=No+Image' }}"
             style="width:300px; border-radius:8px; margin-bottom:25px;">

        <p><b>Release date:</b> {{ $movie->release_date }}</p>
        <p><b>Director:</b> {{ $movie->director }}</p>
        <p><b>Runtime:</b> {{ $movie->runtime_minutes }} minutes</p>
        <p><b>Actors:</b> {{ $movie->actors }}</p>

        <p style="margin-top:30px;">
            <a href="{{ route('catalog.index') }}" style="text-decoration:none; color:#007bff;">← Back to catalog</a>
        </p>
    </div>
@endsection
