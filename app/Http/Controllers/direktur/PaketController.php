<?php

namespace App\Http\Controllers\direktur;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Paket',
            'pakets' => Paket::orderBy('created_at', 'desc')->get()
        ];
        return view('direktur.paket.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Paket',
            'layanans' => Layanan::get(),
        ];
        return view('direktur.paket.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required',
            'satuan' => 'required',
            'barang' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required',
        ]);

        Paket::create([
            'id_layanan' => $request->layanan,
            'nama_satuan' => $request->satuan,
            'barang' => $request->barang,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga
        ]);

        return redirect()->route('paket')->with('success', 'Proses Tambah Paket Berhasil!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Tambah Paket',
            'paket' => Paket::where('id', $id)->first(),
            'layanans' => Layanan::get(),
        ];
        return view('direktur.paket.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'layanan' => 'required',
            'satuan' => 'required',
            'barang' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required',
        ]);

        Paket::where('id', $id)->update([
            'id_layanan' => $request->layanan,
            'nama_satuan' => $request->satuan,
            'barang' => $request->barang,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga
        ]);

        return redirect()->route('paket')->with('success', 'Proses Edit Paket Berhasil!');
    }

    public function delete($id)
    {
        $paket = Paket::where('id', $id)->first();
        $paket->delete();

        return redirect()->route('paket')->with('success', 'Proses Delete Paket Berhasil!');
    }
}
