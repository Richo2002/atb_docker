<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
