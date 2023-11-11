<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Motorcycle extends Model
{
    use HasFactory;

    protected $table = 'motorcycle';

    protected $fillable = [
        'trunk_size',
        'fuel_capacity',
        'description',
        'genre',
        'status',
        'loan_date',
        'loan_due'
    ];

    public function vehicle(): MorphOne
    {
        return $this->morphOne(Vehicle::class, 'vehicleable');
    }
}
