<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image'
    ];

    protected $appends =  [
        'formatted_created_at',
    ];

    public function getFormattedCreatedAtAttribute() {
        return $this->created_at->format('M d, Y');
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
