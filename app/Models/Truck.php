<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Truck extends Model
{
    use HasFactory;

    protected $table = 'truck';

    protected $fillable = [
        'wheel',
        'cargo_area'
    ];

    public function vehicles(): MorphMany
    {
        return $this->morphMany(Vehicle::class, 'vehicleable');
    }
}
