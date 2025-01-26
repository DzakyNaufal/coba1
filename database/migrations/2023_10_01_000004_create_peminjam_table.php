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
        Schema::create('peminjam', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('telp');
            $table->string('alamat');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->integer('jumlah_buku_tersisa');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('buku_id');
            $table->timestamps();

             // Set foreign keys
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('buku_id')->references('id')->on('buku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjam');
    }
};
