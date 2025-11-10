@extends('layouts.app')

@section('content')
    <h1>Create Movie</h1>

    <form method="POST" action="{{ route('admin.movies.store') }}">
        @csrf
        @include('admin.movies.form')
        <button type="submit">Save</button>
    </form>
@endsection
