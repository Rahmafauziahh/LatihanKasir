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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_transaksi');
            $table->foreignId('id_produk')->constrained('barang')->onDelete('cascade'); // relasi dengan produk/barang
            $table->integer('jenis_pembayaran');
            $table->decimal('total_bayar', 15, 2);
            $table->date('kembalian');
            $table->date('uang_pembeli');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
