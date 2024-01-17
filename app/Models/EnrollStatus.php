<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollStatus extends Model
{
    protected $status = [
        'baru' => 'Baru',
        'proses' => 'Diproses',
        'terima' => 'Diterima',
        'tolak' => 'Ditolak',
    ];

    public function getList() {
        return collect($this->status);
    }
}
