@extends('layouts.app')

@section('content')
    <h1>{{ $movie->title }}</h1>

    <img src="{{ $movie->poster_url }}" style="width:200px; margin-bottom:20px; border-radius:6px;">

    <p><b>Release date:</b> {{ $movie->release_date }}</p>
    <p><b>Director:</b> {{ $movie->director }}</p>
    <p><b>Runtime:</b> {{ $movie->runtime_minutes }} minutes</p>
    <p><b>Actors:</b> {{ $movie->actors }}</p>

    <p><a href="{{ route('catalog.index') }}">Back</a></p>
@endsection
