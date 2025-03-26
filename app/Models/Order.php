<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['id_user', 'id_paket', 'id_pelaksana_cabang', 'kode_order', 'tanggal_order', 'status', 'bukti_selesai', 'tanggal_selesai', 'keterangan', 'type', 'nama_off', 'no_hp_off'];

    use SoftDeletes;

    public function customer()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pelaksana()
    {
        return $this->belongsTo(User::class, 'id_pelaksana_cabang');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}
