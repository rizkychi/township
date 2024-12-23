<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogImage extends Model
{
    use HasFactory;

    protected $table = 'catalog_image';

    function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id', 'id', 'catalog');
    }
}
