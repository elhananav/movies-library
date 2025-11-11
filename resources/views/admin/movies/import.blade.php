@extends('layouts.app')

@section('content')
    <h1>Import movie from OMDb</h1>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('admin.movies.import') }}" method="POST" style="margin-top:20px">
        @csrf
        <label>Movie Title / IMDb ID:</label><br>
        <input type="text" name="query" style="width:300px">
        <br><br>
        <button type="submit">Search</button>
    </form>
@endsection
