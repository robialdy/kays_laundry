<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Auth'
        ];
        return view('auth.login', $data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);

                if ($user->role == 'C') {
                    return redirect('/');
                } elseif ($user->role == 'OC') {
                    return redirect()->route('dashboard.operator-cabang');
                } elseif ($user->role == 'PC') {
                    return redirect()->route('dashboard.pelaksana-cabang');
                } elseif ($user->role == 'K') {
                    return redirect()->route('dashboard.kurir');
                } elseif ($user->role == 'D') {
                    return redirect()->route('dashboard.direktur');
                } else {
                    abort(404, 'User tidak memiliki role!');
                }
            } else {
                return back()->with('error-password', 'Password Salah!');
            }
        } else {
            return back()->with('error-username', 'Username Tidak Ditemukan!');
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'cabangs' => Cabang::get(),
            'provincys' => $this->_getCity()
        ];
        return view('auth.register', $data);
    }

    public function registerSignIn(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:user',
            'no_hp' => 'required',
            'cabang' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
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
            'role' => 'C',
            'status' => 'Offline',
            'slug' => Str::slug($request->username),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Proses Mendaftar Berhasil!');
    }

    private function _getCity()
    {
        // data kota
        $fileJson = storage_path('app/public/city.json');
        $dataCity = json_decode(file_get_contents($fileJson), true);

        return $dataCity;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
