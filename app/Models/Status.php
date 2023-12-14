<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $status = [
        'aktif' => 'Aktif',
        'tidak_aktif' => 'Tidak Aktif',
        'mengundurkan_diri' => 'Mengundurkan Diri',
        'dikeluarkan' => 'Dikeluarkan',
        'keluarga_besar' => 'Keluarga Besar TKSCI',
    ];

    public function getList() {
        return collect($this->status);
    }
}
