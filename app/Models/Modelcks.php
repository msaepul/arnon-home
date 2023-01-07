<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Modelcks extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'tb_ceksopir';
    protected $primaryKey = 'id';

    protected $fillable     = ['nomor', 'cabang', 'bulan', 'sopir', 'jenis_sopir', 'jalur', 'tanggal', 'pulang', 'berangkat', 'selisih', 'cek0', 'cek1', 'tensi', 'cek2', 'cek3', 'cek4', 'cek5', 'cek6', 'kelaikan', 'ket', 'alasan', 'petugas', 'disetujui', 'status', 'last_edit'];

    public $timestamps = true;

    public function produk()
    {
        return $this->belongsTo(Modelroti::class);
    }
}
