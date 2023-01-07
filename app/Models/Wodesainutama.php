<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Wodesainutama extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'tb_wodesain';
    protected $primaryKey = 'id';

    protected $fillable     = ['nomor', 'jenis', 'bulan', 'tgl', 'cabang', 'merek', 'produk', 'izinedar', 'mui', 'ukuran', 'komunikasi', 'deskripsi', 'status', 'last_edit', 'lampiran1'];

    public $timestamps = true;

    public function produk()
    {
        return $this->belongsTo(Modelroti::class);
    }
}
