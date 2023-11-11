<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function vehicles(): MorphMany
    {
        return $this->morphMany(Vehicle::class, 'vehicleable');
    }
}
