<?php

namespace App\Services;

use App\Models\Genre;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class MovieImportService
{
    private const IMDB_ID_PREFIX = 'tt';

    private readonly string $apiKey;
    private readonly string $baseUrl;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null) {

        $this->apiKey = $apiKey ?: config('services.omdb.key');
        $this->baseUrl = $baseUrl ?: config('services.omdb.url');
    }

    /**
     * Fetch movie data from OMDb API by title or IMDb ID.
     *
     * @param string $query
     * @return array|null
     */
    public function fetch(string $query): ?array
    {
        $params = [
            'apikey' => $this->apiKey,
        ];

        if (str_starts_with($query, self::IMDB_ID_PREFIX)) {
            $params['i'] = $query;
        } else {
            $params['t'] = $query;
        }

        try {
            $response = Http::get($this->baseUrl, $params);

            $data = $response->json();

            if (!isset($data['Response']) || $data['Response'] === 'False') {
                Log::warning('OMDb API: movie not found', ['query' => $query, 'response' => $data]);
                return null;
            }

            return [
                'title' => $data['Title'] ?? '',
                'release_date' => isset($data['Released']) && $data['Released'] !== 'N/A'
                    ? Carbon::createFromFormat('d M Y', $data['Released'])->format('Y-m-d')
                    : null,
                'poster_url' => $data['Poster'] ?? '',
                'director' => $data['Director'] ?? '',
                'runtime_minutes' => isset($data['Runtime']) ? intval($data['Runtime']) : null,
                'actors' => $data['Actors'] ?? '',
                'genres' => isset($data['Genre'])
                    ? array_map('trim', explode(',', $data['Genre']))
                    : [],
            ];
        } catch (Throwable $e) {
            Log::error('OMDb API error', ['query' => $query, 'error' => $e->getMessage()]);
            return null;
        }
    }
}
