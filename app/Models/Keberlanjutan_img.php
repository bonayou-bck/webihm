<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keberlanjutan_img extends Model
{
    use HasFactory;

    protected $table = 'keberlanjutan_img';

    protected $fillable = [
        'keberlanjutan_id',
        'src',
        'description',
    ];

    public function keberlanjutan()
    {
        return $this->belongsTo(Keberlanjutan::class, 'keberlanjutan_id', 'id');
    }
}
