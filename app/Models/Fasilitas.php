<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';

    protected $fillable = [
        // 'category_id',
        'title',
        'slug',
        'content',
        'cover',
        'created_ad',
        'updated_at',
    ];

    protected $hidden = [
    ];

    public function history(): HasMany
    {
        return $this->hasMany(BlogHistory::class, 'fasilitas_id', 'id');
    }
    public function Fasilitas_img(): HasMany
    {
        return $this->hasMany(Fasilitas_img::class, 'fasilitas_id', 'id');
    }

}
