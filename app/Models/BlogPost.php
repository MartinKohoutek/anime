<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'slug', 'status', 'description',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
