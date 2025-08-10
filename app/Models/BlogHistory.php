<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogHistory extends Model
{
    use HasFactory;

    protected $table = 'blog_history';

    protected $fillable = [
        'blog_id',
        'title_id',
        'title_en',
        'notes',
        'created_by',
        'status'
    ];

    protected $hidden = [];

    public function history(): HasMany
    {
        return $this->hasMany(Blog::class, 'id', 'blog_id');
    }

}
