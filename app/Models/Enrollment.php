<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $table = 'enrollment';

    protected $appends = ['status_label', 'status_label_html', 'status_label_color'];

    public function getStatusLabelAttribute()
    {
        $statuses = new EnrollStatus();
        $statuses = $statuses->getList();
        return $statuses[$this->status] ?? '';
    }

    public function getStatusLabelHtmlAttribute()
    {
        $html = '';
        switch ($this->status) {
            case 'baru':
                $html = '<span class="badge badge-info">' . $this->status_label . '</span>';
                break;
            case 'proses':
                $html = '<span class="badge badge-warning">' . $this->status_label . '</span>';
                break;
            case 'terima':
                $html = '<span class="badge badge-success">' . $this->status_label . '</span>';
                break;
            case 'tolak':
                $html = '<span class="badge badge-danger">' . $this->status_label . '</span>';
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
            case 'baru':
                $color = 'info';
                break;
            case 'proses':
                $color = 'warning';
                break;
            case 'terima':
                $color = 'success';
                break;
            case 'tolak':
                $color = 'danger';
                break;
            default:
                $color = '';
                break;
        }
        return $color;
    }
}
