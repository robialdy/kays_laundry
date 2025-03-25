<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cabang extends Model
{
    protected $table = 'cabang';
    protected $fillable = ['nama_cabang','kode_cabang','kota','alamat'];

    use SoftDeletes;
}
