<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modeldept extends Model
{
    use HasFactory;

    protected $table = 'tb_dept';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
