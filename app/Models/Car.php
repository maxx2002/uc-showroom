<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Car extends Model
{
    use HasFactory;

    protected $table = 'car';

    protected $fillable = [
        'fuel_type',
        'trunk_area'
    ];

    public function vehicle(): MorphOne
    {
        return $this->morphOne(Vehicle::class, 'vehicleable');
    }
}
