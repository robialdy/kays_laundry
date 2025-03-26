<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layanan extends Model
{
    protected $table = 'layanan';

    protected $fillable = ['no_layanan','nama_layanan'];

    use SoftDeletes;
}
