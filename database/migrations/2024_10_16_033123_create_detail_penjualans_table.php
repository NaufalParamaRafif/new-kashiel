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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_produk');
            $table->decimal('subtotal', total: 10, places: 2);
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->unsignedBigInteger('penjualan_id')->nullable();

            $table->foreign('produk_id')->references('id')->on('products')->onDelete('set null');;
            $table->foreign('penjualan_id')->references('id')->on('penjualans')->onDelete('set null');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
