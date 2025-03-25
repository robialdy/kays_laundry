<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    protected $fillable = ['nama_satuan','barang','nama_paket','id_layanan','harga'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }
}
