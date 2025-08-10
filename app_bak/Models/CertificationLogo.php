<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificationLogo extends Model
{
    use HasFactory;

    protected $table = 'certification_logo';

    protected $fillable = [
        'src',
        'is_active'
    ];

    protected $hidden = [];

}
