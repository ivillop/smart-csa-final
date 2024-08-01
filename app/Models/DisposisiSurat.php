<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_dibuat',
        'pemberi_disposisi',
        'penerima_disposisi',
        'instruksi_disposisi',
        'status_disposisi',
    ];
}
