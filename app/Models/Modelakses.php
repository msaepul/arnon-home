<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelakses extends Model
{
    use HasFactory;

    protected $table = 'tb_akses';
    protected $primaryKey = 'id';

    protected $fillable = ['id_akses', 'id', 'MKT', 'PRC', 'PBL', 'GBB', 'PRO', 'ENG', 'QCT', 'GPJ', 'EKS', 'KND', 'FIN', 'ACC', 'HRD', 'SIS', 'EDP', 'TAX', 'GRR', 'RND', 'GSP', 'BM', 'CRT'];
}
