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
        Schema::create('produk_terjuals', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_produk');
            $table->decimal('harga', total: 10, places: 2);
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('penjualan_id');

            $table->foreign('produk_id')->references('id')->on('products');
            $table->foreign('penjualan_id')->references('id')->on('penjualans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_terjuals');
    }
};
