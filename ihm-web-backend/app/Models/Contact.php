<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'admin_id',
        'address_id',
        'address_en',
        'email',
        'telephone',
        'fax',
        'cover',
        'location_map',
        'is_active',
        'is_footer'
    ];

    protected $hidden = [
        'admin_id',
        // 'created_at',
        'updated_at',
        // 'is_active',
        // 'is_footer'
    ];

}
