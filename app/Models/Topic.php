<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $topic = [
        'Post',
        'Pengumuman',
        'Event',
        'Berita',
    ];

    public function getList() {
        return collect($this->topic);
    }
}
