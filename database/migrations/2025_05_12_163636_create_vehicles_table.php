<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('type'); // Misalnya: 'mobil', 'motor'
            $table->string('plate_number');
            $table->decimal('price_per_day', 10, 2); // Harga sewa per hari
            $table->enum('status', ['available', 'rented', 'maintenance']); // Status kendaraan
            $table->string('image')->nullable(); // Gambar kendaraan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
