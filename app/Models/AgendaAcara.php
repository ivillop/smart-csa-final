<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaAcara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_acara',
        'tanggal_pelaksanaan',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'penyelenggara',
        'prioritas',
        'status',
    ];
}
