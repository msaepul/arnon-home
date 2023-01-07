<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelcabang extends Model
{
    use HasFactory;

    protected $table = 'tb_cabang';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
