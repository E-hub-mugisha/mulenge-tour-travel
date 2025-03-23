<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'location',
        'duration',
        'status',
        'trip_highlights',
        'included',
        'exclude'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    // Define relationships to activities, accommodations, and transportation types
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'tour_activities');
    }

    public function accommodations()
    {
        return $this->belongsToMany(AccommodationType::class, 'tour_accommodation');
    }

    public function transportation()
    {
        return $this->belongsToMany(TransportationType::class, 'tour_transportation');
    }
    public function relatedTours()
    {
        return Tour::where('location', $this->location)
            ->where('id', '!=', $this->id) // Exclude the current tour
            ->take(4) // Limit the number of related tours displayed
            ->get();
    }
}
