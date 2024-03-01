<?php

namespace App\Models;

use App\Traits\HasScope;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FConseling extends Model
{
    public $table = "form_conseling";
    use HasFactory, HasSlug, HasScope;

    protected $fillable = [
        'id',
        'nama_counsele',
        'jabatan_counsele',
        'nama_konselor',
        'jabatan_konselor',
        'tanggal',
        'topik_counseling',
        'respon_counsele',
        'follow_up',
        'kriteria_keberhasilan',
        'target',
        'hasil',
        'summary',
    ];

    // generate cover
    public function getCoverAttribute($cover)
    {
        return asset('storage/covers/' . $cover);
    }

    // relationship with tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship with videos
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    // relationship with carts
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
