<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Car extends Model
{
    use HasFactory;

    protected $table = 'car';

    protected $fillable = [
        'fuel_type',
        'trunk_area'
    ];

    public function vehicles(): MorphMany
    {
        return $this->morphMany(Vehicle::class, 'vehicleable');
    }
}
