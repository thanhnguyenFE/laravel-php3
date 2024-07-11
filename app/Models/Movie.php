<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'duration',
        'release_date',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_movies');
    }

    public function schedules(): hasMany
    {
        return $this->hasMany(Schedule::class, 'movie_id');
    }

    public function comments(): hasMany{
        return $this->hasMany(Comment::class, 'movie_id');
    }

    public function getMoviesActive()
    {
        return $this->where('status', 1)->get();
    }
}
