@extends('layouts.app')

@section('content')
    <h1>Movies</h1>

    <a href="{{ route('admin.movies.create') }}">Create new movie</a>

    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Release Date</th>
            <th>Director</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->director }}</td>
                <td>
                    <a href="{{ route('admin.movies.edit', $movie) }}">Edit</a>
                    <form action="{{ route('admin.movies.destroy', $movie) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $movies->links() }}
@endsection
