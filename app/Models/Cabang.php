<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabang';
    protected $fillable = ['nama_cabang','kode_cabang','kota','alamat'];
}
