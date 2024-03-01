<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

        //field yang bisa terisi
        protected $fillable = [
            'departemenCD',
            'departemenName',
            'divisiID'
        ];
    
        //relasi ke table divisi utk ambil data divisi
        public function divisi()
        {
            return $this->belongsTo(Divisi::class, 'id');
        }
    
        public function karyawan()
        {
            return $this->hasMany(Karyawan::class, 'id');
        }
}
