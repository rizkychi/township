<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $topic = [
        'Berita',
        'Pengumuman',
        'Event',
        'Galeri',
    ];

    public function getList() {
        return collect($this->topic);
    }
}
