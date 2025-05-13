<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalHistory extends Model
{
      protected $fillable = [
        'customer_id',
        'rental_id',
        'status',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
