<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderVehicle extends Model
{
    use HasFactory;

    protected $table = 'order_vehicle';

    protected $fillable = [
        'order_id',
        'vehicle_id',
        'amount'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    } 

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    } 
}
