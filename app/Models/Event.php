<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug',
        'cover',
        'status',
        'description'
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
}
