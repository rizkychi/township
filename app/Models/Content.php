<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'content';

    protected $casts = [
        'published' => 'boolean',
    ];

    public function getNext() {
        return $this->where('id', '>', $this->id)->orderBy('id','asc')->first();
    }

    public function getPrev() {
        return $this->where('id', '<', $this->id)->orderBy('id','desc')->first();
    }
}
