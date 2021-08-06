<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $table = 'code';

    protected $casts = [
        'worked' => 'boolean',
    ];

    public $status_list = [
        'submitted',
        'approved',
        'rejected'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
