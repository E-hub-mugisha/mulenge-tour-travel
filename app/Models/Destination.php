<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description','image'];

    public function locations()
    {
        return $this->hasMany(DestinationLocation::class);
    }
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    // The hotels relationship
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
