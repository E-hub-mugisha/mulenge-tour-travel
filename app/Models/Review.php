<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id', 'user_id', 'message', 
        'location_rating', 'price_rating', 'amenities_rating', 
        'rooms_rating', 'services_rating'
    ];

    public function getAverageRatingAttribute()
    {
        $ratings = [
            $this->location_rating,
            $this->price_rating,
            $this->amenities_rating,
            $this->rooms_rating,
            $this->services_rating
        ];
        
        return array_sum($ratings) / count($ratings); // Calculate average rating
    }

    // Relationship with Tour
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
