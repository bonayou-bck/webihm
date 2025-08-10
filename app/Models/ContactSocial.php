<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSocial extends Model
{
    use HasFactory;

    protected $table = 'contact_social';

    protected $fillable = [
        'name',
        'link',
        'is_active'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'is_active'
    ];

}
