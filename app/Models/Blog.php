<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'category_id',
        'title_id',
        'slug_id',
        'content_id',
        'cover',
        'created_by',
        'updated_by',
        'approved_by',
        'approved_at',
        'published_at'
    ];

    protected $hidden = [
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(BlogCategory::class, 'id', 'category_id');
    }

    public function created_by_detail(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'created_by')->select(['id', 'name', 'role']);
    }

    public function updated_by_detail(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'updated_by')->select(['id', 'name', 'role']);
    }

    public function history(): HasMany
    {
        return $this->hasMany(BlogHistory::class, 'blog_id', 'id');
    }

}
