<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Truck extends Model
{
    use HasFactory;

    protected $table = 'truck';

    protected $fillable = [
        'wheel',
        'cargo_area'
    ];

    public function vehicle(): MorphOne
    {
        return $this->morphOne(Vehicle::class, 'vehicleable');
    }
}
