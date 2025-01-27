<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = ['penulis', 'judul', 'published_date','buku_id'];

    public function registrasi()
    {
        return $this->hasMany(Registrasi::class, 'buku_id');
    }

    // Tidak ada relasi ke tabel lain karena penulis berupa teks
}

