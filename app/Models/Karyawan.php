<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'status',
        'jabatan',
        'divisiID',
        'departemenID',
    ];

    //relasi ke divisi
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id');
    }

    //relasi ke departemen
    public function departemen()
    {
        return $this->belongsTo(Departemen::class,'id');
    }

    //relasi ke identifikasi Coaching
    public function identifikasicoaching()
    {
        return $this->hasMany(Identifikasicoaching::class,'id');
    }


    //relasi ke fuser
    public function user()
        {
            return $this->belongsTo(Users::class,'NIK');
        }
}
