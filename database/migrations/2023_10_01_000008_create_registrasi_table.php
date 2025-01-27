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
        Schema::dropIfExists('registrasi'); // Drop the table if it exists
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->date('tanggal_lahir');
            $table->string('telp');
            $table->string('alamat');
            $table->unsignedBigInteger('agama_id');
            $table->unsignedBigInteger('status_id');
            $table->date('tanggal_peminjaman'); // New column
            $table->date('tanggal_pengembalian'); // New column
            $table->string('status_buku')->default('Tersedia'); // New column
            $table->unsignedBigInteger('buku_id'); // New column for book title
            $table->timestamps();

            // Set foreign keys
            $table->foreign('agama_id')->references('id')->on('agama');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('buku_id')->references('id')->on('buku'); // Foreign key for buku
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};
