<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    use HasFactory;

    protected $table = 'cover';

    protected $fillable = [
      'type',
      'src',
      'is_video',
      'created_by',
      'updated_by'
    ];

    protected $hidden = [
      'id',
      'created_at',
      'updated_at',
      'created_by',
      'updated_by'
    ];

}
