<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Modelhome extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'tb_login';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public $sortable = [
        'dept', 'cabang', 'nama_lengkap',
    ];
}
