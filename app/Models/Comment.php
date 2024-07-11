<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['user_id', 'movie_id', 'content', 'rating', 'date'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
