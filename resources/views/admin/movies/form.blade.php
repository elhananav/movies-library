<div>
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $prefill['title'] ?? $movie->title ?? '') }}">
</div>

<div>
    <label>Release date</label>
    <input type="date" name="release_date" value="{{ old('release_date', $prefill['release_date'] ?? $movie->release_date ?? '') }}">
</div>

<div>
    <label>Poster URL</label>
    <input type="text" name="poster_url" value="{{ old('poster_url', $prefill['poster_url'] ?? $movie->poster_url ?? '') }}">
</div>

<div>
    <label>Director</label>
    <input type="text" name="director" value="{{ old('director', $prefill['director'] ?? $movie->director ?? '') }}">
</div>

<div>
    <label>Runtime (minutes)</label>
    <input type="number" name="runtime_minutes" value="{{ old('runtime_minutes', $prefill['runtime_minutes'] ?? $movie->runtime_minutes ?? '') }}">
</div>

<div>
    <label>Actors</label>
    <textarea name="actors">{{ old('actors', $prefill['actors'] ?? $movie->actors ?? '') }}</textarea>
</div>

@if(!empty($prefill['genres']))
    @foreach($prefill['genres'] as $genre)
        <input type="hidden" name="genre_names[]" value="{{ $genre }}">
    @endforeach
@endif
