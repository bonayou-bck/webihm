<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CertificateImage extends Model
{
    use HasFactory;

    protected $table = 'certificate_image';

    protected $fillable = [
        'certificate_id',
        'src'
    ];

    protected $hidden = [];

    public function images(): HasMany
    {
        return $this->hasMany(Certificate::class, 'id', 'certificate_id');
    }

}
