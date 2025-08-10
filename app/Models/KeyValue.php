<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyValue extends Model
{
    use HasFactory;

    protected $table = 'key_value';

    protected $fillable = [
        'title_id',
        'title_en',
        'title_alt_id',
        'title_alt_en',
        'description_id',
        'description_en',
        'content_id',
        'content_en',
        'is_list',
        'is_active'
    ];

    protected $hidden = [];

}
