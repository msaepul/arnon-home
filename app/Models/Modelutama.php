<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Modelutama extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'tb_utama';
    protected $primaryKey = 'kode';
    protected $fillable = [
        'nomor', 'jenis', 'bulan', 'tgl', 'kategori', 'subkategori', 'dari', 'd_dept', 'kepada', 'k_dept', 'lokasi', 'obyek', 'keadaan', 'dibuat', 'status', 'id_buat', 'randlink', 'lampiran1', 'lampiran2', 'lampiran3', 'lampiran4', 'lampiran5'
    ];
    public $timestamps = true;
}
