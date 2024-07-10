<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['movie_id', 'room_id', 'start_at', 'end_at', 'date', 'status'];

    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id');

    }

    public function room(){
        return $this->belongsTo(Room::class, 'room_id');

    }

    public function getScheduleActive()
    {
        return $this->where('status', 1)->get();
    }


}
