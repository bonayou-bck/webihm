<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificate';

    protected $fillable = [
        'name_id',
        'description_id',
        'logo',
        'showcase',
    ];

    protected $hidden = [];

    public function images(): HasMany
    {
        return $this->hasMany(CertificateImage::class, 'certificate_id', 'id');
    }

}
