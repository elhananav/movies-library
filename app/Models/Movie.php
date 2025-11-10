<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id
 * @property string $title
 * @property DateTime|null $release_date
 * @property string|null $poster_url
 * @property string|null $director
 * @property int|null $runtime_minutes
 * @property string|null $actors
 *
 * @mixin Builder
 */
class Movie extends Model
{
    protected $fillable = [
        'title',
        'release_date',
        'poster_url',
        'director',
        'runtime_minutes',
        'actors',
    ];
}
