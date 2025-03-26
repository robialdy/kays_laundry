<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paket extends Model
{
    protected $table = 'paket';

    protected $fillable = ['nama_satuan','barang','nama_paket','id_layanan','harga'];

    use SoftDeletes;

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }
}
