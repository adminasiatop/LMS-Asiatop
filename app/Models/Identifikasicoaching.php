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
        'r_coaching',
        'r_enhancement',
        'r_mentoring',
        'r_counseling',
        'r_meeting',
        'r_clinic',
        'p_leadership',
        'p_developforothers',
        'p_timemanagement',
        'p_transferknowledge',
        'p_monitoringlaporanteam',
        'p_idealhabits',
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
