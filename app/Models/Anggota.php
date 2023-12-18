<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $appends = ['status_label', 'status_label_html', 'status_label_color'];

    public function getStatusLabelAttribute()
    {
        $statuses = new Status();
        $statuses = $statuses->getList();
        return $statuses[$this->status] ?? '';
    }

    public function getStatusLabelHtmlAttribute()
    {
        $html = '';
        switch ($this->status) {
            case 'aktif':
                $html = '<span class="badge badge-success">' . $this->status_label . '</span>';
                break;
            case 'tidak_aktif':
                $html = '<span class="badge badge-secondary">' . $this->status_label . '</span>';
                break;
            case 'mengundurkan_diri':
                $html = '<span class="badge badge-warning">' . $this->status_label . '</span>';
                break;
            case 'dikeluarkan':
                $html = '<span class="badge badge-danger">' . $this->status_label . '</span>';
                break;
            case 'keluarga_besar':
                $html = '<span class="badge badge-info">' . $this->status_label . '</span>';
                break;
            default:
                $html = '';
                break;
        }
        return $html;
    }

    public function getStatusLabelColorAttribute()
    {
        $color = '';
        switch ($this->status) {
            case 'aktif':
                $color = 'success';
                break;
            case 'tidak_aktif':
                $color = 'secondary';
                break;
            case 'mengundurkan_diri':
                $color = 'warning';
                break;
            case 'dikeluarkan':
                $color = 'danger';
                break;
            case 'keluarga_besar':
                $color = 'info';
                break;
            default:
                $color = '';
                break;
        }
        return $color;
    }
}
