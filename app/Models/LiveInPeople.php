<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveInPeople extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'cover',
        'is_active'
    ];

    protected $hidden = [];

}
