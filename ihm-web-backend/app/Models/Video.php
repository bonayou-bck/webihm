<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    use HasFactory;

    protected $table = 'video';

    protected $fillable = [
        'video_group_id',
        'name',
        'description',
        'cover',
        'video',
        'is_active'
    ];

    protected $hidden = [];

    public function group(): HasMany
    {
        return $this->hasMany(VideoGroup::class, 'id', 'video_group_id');
    }

}
