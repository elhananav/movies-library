<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 *
 * @mixin Builder
 */
class Genre extends Model
{
    protected $fillable = ['name'];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}
