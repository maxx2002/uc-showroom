<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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

    public function vehicleable(): MorphTo
    {
        return $this->morphTo();
    }

    public function order_vehicle()
    {
        return $this->hasMany(OrderVehicle::class, 'vehicle_id', 'id');
    }
}
