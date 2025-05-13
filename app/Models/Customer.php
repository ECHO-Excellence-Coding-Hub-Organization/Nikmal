<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'identity_number',
        'identity_type',
    ];

    // Untuk mengenkripsi password saat simpan ke database
    protected $hidden = [
        'password',
    ];

    // Relasi dengan model Rental (1 ke banyak)
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    // Untuk validasi otomatis ketika menggunakan FormRequest
    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($customer) {
    //         // Meng-hash password saat menyimpan data customer baru
    //         $customer->password = bcrypt($customer->password);
    //     });
    // }
}
