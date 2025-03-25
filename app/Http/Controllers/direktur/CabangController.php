<?php

namespace App\Http\Controllers\direktur;

use App\Models\Cabang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CabangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Cabang',
            'cabangs' => Cabang::orderBy('created_at', 'desc')->get()
        ];
        return view('direktur.cabang.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Cabang',
            'provincys' => $this->_getCity()
        ];
        return view('direktur.cabang.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'kota' => 'required',
            'alamat' => 'required'
        ]);

        Cabang::create([
            'nama_cabang' => $request->nama_cabang,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'kode_cabang' => 'C-' . time()
        ]);

        return redirect()->route('cabang')->with('success', 'Proses Tambah Cabang Berhasil!');
    }

    public function edit($kode)
    {
        $data = [
            'title' => 'Edit Cabang',
            'provincys' => $this->_getCity(),
            'cabang' => Cabang::where('kode_cabang', $kode)->first(),
        ];
        return view('direktur.cabang.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'kota' => 'required',
            'alamat' => 'required'
        ]);

        Cabang::where('id', $id)->update([
            'nama_cabang' => $request->nama_cabang,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('cabang')->with('success', 'Proses Edit Cabang Berhasil!');
    }

    public function delete($id)
    {
        $cabang = Cabang::where('id', $id)->first();
        $cabang->delete();

        return redirect()->route('cabang')->with('success', 'Proses Delete Cabang Berhasil!');
    }

    private function _getCity()
    {
        $fileJson = storage_path('app/public/city.json');

        $dataCity = json_decode(file_get_contents($fileJson), true);

        return $dataCity;
    }
}
