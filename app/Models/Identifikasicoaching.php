<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifikasicoaching extends Model
{
    use HasFactory;

    protected $fillable = [
        'coachkaryawanID',
        'coacheekaryawanID',
        'tanggal',
        'permasalahan',
        'strategi',
        'rencana',
        'rekomendasi',
        'penilaian',
        'goal',
        'reality',
        'opsi',
        'will'
    ];

     //relasi ke karyawan
     public function karyawan()
     {
         return $this->belongsTo(Karyawan::class, 'id');
     }
}
