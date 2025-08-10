<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_category';

    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'blog_id'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    public function posts_ids(): HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

}
