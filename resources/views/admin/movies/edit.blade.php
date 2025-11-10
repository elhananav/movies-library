@extends('layouts.app')

@section('content')
    <h1>Edit Movie</h1>

    <form method="POST" action="{{ route('admin.movies.update', $movie) }}">
        @csrf
        @method('PUT')
        @include('admin.movies.form')
        <button type="submit">Update</button>
    </form>
@endsection
