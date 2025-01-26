<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $table = 'peminjam'; // Specify the table name if it differs from the model name

    protected $fillable = [
        'nama',
        'email',
        'telp',
        'alamat',
        'status',
        'judul_buku',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
    ];
}
