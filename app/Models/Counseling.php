<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counseling extends Model
{
    use HasFactory;

    protected $fillable = [
        'coachkaryawanID',
        'coacheekaryawanID',
        'tanggal',
        'topikkonseling',
        'responsekonseling',
        'fukonseling',
        'targetkonseling',
        'hasilkonseling',
        'summary'
    ];

    //relasi ke karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id');
    }
}
