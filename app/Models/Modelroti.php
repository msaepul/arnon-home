<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelroti extends Model
{
    use HasFactory;

    protected $table = 'tb_roti';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id', 'merek', 'produk', 'kode'
    ];

    public function dataWoall()
    {
        return $this->hasMany(Wodesainutama::class);
    }
}
