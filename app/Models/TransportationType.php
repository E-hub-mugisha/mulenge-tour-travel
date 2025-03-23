<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportationType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name'];

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_transportation');
    }
}
