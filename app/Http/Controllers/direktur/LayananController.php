<?php

namespace App\Http\Controllers\direktur;

use App\Models\Layanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Layanan',
            'layanans' => Layanan::orderBy('created_at', 'desc')->get(),
        ];
        return view('direktur.layanan.index', $data);
    }

    public function create()
    {
        $maxNo = Layanan::where('no_layanan', 'LIKE', 'kays%')->max('no_layanan');

        if ($maxNo) {
            $lastNumber = Str::of($maxNo)->substr(4)->toString();
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $data = [
            'title' => 'Tambah Layanan',
            'no_layanan' => 'kays' . $newNumber
        ];
        return view('direktur.layanan.create', $data);
    }

    public function store()
    {

    }
}
