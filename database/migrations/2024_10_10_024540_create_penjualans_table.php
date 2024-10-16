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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_harga', total: 10, places: 2);
            $table->unsignedBigInteger('pelanggan_id')->nullable(); 
            $table->unsignedBigInteger('kasir_id')->nullable(); 
            
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('set null');
            $table->foreign('kasir_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
