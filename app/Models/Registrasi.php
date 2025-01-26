<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasi';
    protected $fillable = ['nama','email','tanggal_lahir','telp','alamat','tanggal_peminjaman','tanggal_pengembalian','jumlah_buku_tersisa','agama_id','status_id','buku_id'];

    public function agama() {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
