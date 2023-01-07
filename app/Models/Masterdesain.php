<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterdesain extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_masterdesain';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id', 'id_produk', 'id_cabang', 'masterdesain', 'last_edit'
    ];

    public function produk()
    {
        return $this->belongsTo(Modelroti::class);
    }

    public function cabang()
    {
        return $this->belongsTo(Modelcabang::class);
    }
}
