<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ruangan',
        'kapasitas',
        'status_ruangan',
        'tanggal_peminjaman',
        'waktu_mulai',
        'waktu_selesai',
        'peminjam',
        'kontak_peminjam',
    ];
}
