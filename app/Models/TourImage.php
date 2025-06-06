<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'images'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
