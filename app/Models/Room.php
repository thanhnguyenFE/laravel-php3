<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'description', 'status'];

    public function getRoomsActive()
    {
        return $this->where('status', 1)->get();
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'room_id');
    }
}
