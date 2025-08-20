<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slide extends Model
{
    use HasFactory;

    protected $table = 'slide';
    
    protected $fillable = [
        'group_id',
        'src',
        'is_active'
    ];

    protected $hidden = [
    ];

    public function group(): HasMany
    {
        return $this->hasMany(SlideGroup::class, 'id', 'group_id');
    }

}
