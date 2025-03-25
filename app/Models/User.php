<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    protected $fillable = ['full_name','slug','no_hp','kota','alamat_lengkap','role','username','id_cabang','status','password'];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class ,'id_cabang');
    }
}
