<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coaching extends Model
{
    use HasFactory;

    protected $fillable = [
        'coachkaryawanID',
        'coacheekaryawanID',
        'tanggal',
        'topik',
        'point',
        'indikator',
        'rekomendasi',
        'improvement',
        'support',
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
