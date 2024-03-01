<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisiCd',
        'divisiName',
    ];

    public function departemen()
    {
        return $this->hasMany(divisi::class);
    }

    public function karyawan()
    {
        return $this->hasMany(karyawan::class, 'id');
    }

}
