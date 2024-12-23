<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalog';

    protected $casts = [
        'published' => 'boolean',
    ];

    function catalog_images()
    {
        return $this->hasMany(CatalogImage::class, 'catalog_id', 'id');
    }
}
