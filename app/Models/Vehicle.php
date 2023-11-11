<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicle';

    protected $fillable = [
        'model',
        'year',
        'total_passenger',
        'manufacture',
        'price',
        'vehicleable_id',
        'vehicleable_type'
    ];
}
