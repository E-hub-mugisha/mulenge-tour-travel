<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'images','type'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
