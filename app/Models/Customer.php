<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'name',
        'address',
        'description',
        'phone_number',
        'id_card'
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
}
