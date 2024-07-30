<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'url',
        'status',
    ];

    public function getBannersActive()
    {
        return Banner::where('status', 1)->get();
    }
}
