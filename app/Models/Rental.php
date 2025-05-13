<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
     protected $fillable = [
        'customer_id',
        'vehicle_id',
        'pickup_type',
        'start_date',
        'end_date',
        'total_price',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
