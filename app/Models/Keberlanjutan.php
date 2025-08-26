<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keberlanjutan extends Model
{
    use HasFactory;

    protected $table = 'keberlanjutan';

    protected $fillable = [
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
        return $this->hasMany(BlogHistory::class, 'keberlanjutan_id', 'id');
    }
    public function keberlanjutan_img(): HasMany
    {
        return $this->hasMany(Keberlanjutan_img::class, 'keberlanjutan_id', 'id');
    }

}
