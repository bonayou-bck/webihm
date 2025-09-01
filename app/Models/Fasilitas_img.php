<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas_img extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_img';

    protected $fillable = [
        'Fasilitas_img',
        'src',
        'description',
        'caption',
    ];      

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id', 'id');
    }
}
