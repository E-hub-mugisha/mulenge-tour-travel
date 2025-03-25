<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationLocation extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'name', 'description','image'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
