<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use function App\Helpers\formatDate;

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

    public function tickets(): hasMany{
        return $this->hasMany(Ticket::class, 'schedule_id');
    }

    public function queryScheduleActive()
    {
        return $this->where('status', 1);
    }

    public function formatDate($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }


    public function getDateSchedule()
    {
        $dates = $this->queryScheduleActive()->pluck('date')->unique();
        return $dates->map(function ($date) {
            return $this->formatDate($date);
        });
    }

    public function getScheduleByDate($date)
    {
        return $this->where('date', formatDate($date, 'Y-m-d'))
            ->distinct()
            ->pluck('movie_id');
    }


}
