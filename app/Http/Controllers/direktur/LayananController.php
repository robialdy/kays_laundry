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

    public function store(Request $request)
    {
        $request->validate([
            'no_layanan' => 'required',
            'nama_layanan' => 'required'
        ]);

        Layanan::create([
            'no_layanan' => $request->no_layanan,
            'nama_layanan' => $request->nama_layanan
        ]);

        return redirect()->route('layanan')->with('success', 'Proses Tambah Layanan Berhasil!');
    }

    public function edit($no_layanan)
    {
        $data = [
            'title' =>'Edit Layanan',
            'layanan' => Layanan::where('no_layanan', $no_layanan)->first(),
        ];
        return view('direktur.layanan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required'
        ]);

        Layanan::where('id', $id)->update([
            'nama_layanan' => $request->nama_layanan
        ]);

        return redirect()->route('layanan')->with('success', 'Proses Edit Layanan Berhasil!');
    }

    public function delete($id)
    {
        $layanan = Layanan::where('id', $id)->first();
        $layanan->delete();

        return redirect()->route('layanan')->with('success', 'Proses Delete Layanan Berhasil!');
    }
}
