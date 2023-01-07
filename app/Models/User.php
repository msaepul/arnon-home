<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    use HasFactory;

    protected $table        =   'tb_login';
    protected $primaryKey   =   'id';

    protected $fillable     = ['dept', 'cabang', 'nama_lengkap', 'email', 'password', 'spassword', 'no_telegram', 'no_wa', 'level', 'spassword'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
