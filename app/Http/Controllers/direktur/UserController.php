<?php

namespace App\Http\Controllers\direktur;

use App\Models\User;
use App\Models\Cabang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'User',
            'users' => User::orderBy('created_at', 'desc')->get(),
        ];
        return view('direktur.user.index', $data);
    }
    public function create()
    {


        $data = [
            'title' => 'Tambah User',
            'cabangs' => Cabang::get(),
            'provincys' => $this->_getCity()
        ];
        return view('direktur.user.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:user',
            'no_hp' => 'required',
            'cabang' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'role' => 'required',
            'password' => 'required|min:8',
            're-password' => 'same:password'
        ]);

        User::create([
            'full_name' => $request->nama,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'id_cabang' => $request->cabang,
            'kota' => $request->kota,
            'alamat_lengkap' => $request->alamat,
            'role' => $request->role,
            'status' => 'Offline',
            'slug' => Str::slug($request->username),
            'password'=> Hash::make($request->password),
        ]);

        return redirect()->route('user')->with('success', 'Proses Tambah User Berhasil!');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Edit User',
            'user' => User::where('slug', $slug)->first(),
            'cabangs' => Cabang::get(),
            'provincys' => $this->_getCity()
        ];
        return view('direktur.user.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'username' => [
                'required',
                Rule::unique('user', 'username')->ignore($id, 'id')
            ],
            'no_hp' => 'required',
            'cabang' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'role' => 'required',
            're-password' => 'same:password'
        ]);

        User::where('id', $id)->update([
            'full_name' => $request->nama,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'id_cabang' => $request->cabang,
            'kota' => $request->kota,
            'alamat_lengkap' => $request->alamat,
            'role' => $request->role,
            'status' => 'Offline',
            'slug' => Str::slug($request->username),
        ]);

        if ($request->password) {
            User::where('id', $id)->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('user')->with('success', 'Proses Edit User Berhasil!');
    }
    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect()->route('user')->with('success', 'Proses Delete User Berhasil!');
    }

    private function _getCity()
    {
        // data kota
        $fileJson = storage_path('app/public/city.json');
        $dataCity = json_decode(file_get_contents($fileJson), true);

        return $dataCity;
    }
}
