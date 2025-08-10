<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lang extends Model
{
    use HasFactory;

    protected $table = 'lang';

    protected $fillable = [
        'lang_id',
        'content_id',
        'content_en',
        'group_id'
    ];
    
    protected $hidden = [
        // 'id',
        // 'is_active',
        // 'group_id',
        'created_at',
        'updated_at'
    ];

    protected $guarded = [];

    public function group(): HasMany
    {
        return $this->hasMany(LangGroup::class, 'id', 'group_id');
    }

}
