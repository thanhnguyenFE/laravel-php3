<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'schedule_id',
        'total_price',
        'date',
        'payment_method',
        'seats',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            if (empty($ticket->ticket_code)) {
                do {
                    $ticket_code = Str::upper(Str::random(10));
                } while (self::where('ticket_code', $ticket_code)->exists());
                $ticket->ticket_code = $ticket_code;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

}
