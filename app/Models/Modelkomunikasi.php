<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Modelkomunikasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'tb_komunikasi';
    protected $primaryKey = 'id';

    protected $fillable     = ['nomor', 'tgl', 'bulan', 'dari', 'd_cabang', 'd_dept', 'hal', 'kepada', 'k_cabang', 'k_dept', 'deskripsi', 'deskripsi2', 'waktu', 'darijam', 'sampaijam', 'tempat', 'disetujui', 'jenis', 'last_edit', 'status'];

    public $timestamps = true;
    use HasFactory;
}
