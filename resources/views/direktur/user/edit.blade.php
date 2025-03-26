@extends('template.template-direktur')

@section('title', $title);

@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit User</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.direktur') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        {{-- isi konten --}}

        <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('user.update', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nama">Nama <span class="text-danger">*</span></label>
                                            <input type="text" id="nama" class="form-control"
                                                placeholder="Masukan Nama Lengkap" name="nama" value="{{ old('nama', $user->full_name) }}">
                                                @error('nama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="username">Username <span class="text-danger">*</span></label>
                                            <input type="text" id="username" class="form-control"
                                                placeholder="Masukan Username" name="username" value="{{ old('username', $user->username) }}">
                                                @error('username')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="no_hp">No Hp <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">+62</span>
                                                <input type="number" id="no_hp" class="form-control"
                                                    placeholder="Masukan No Hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                                            </div>
                                                @error('no_hp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cabang">Cabang <span class="text-danger">*</span></label>
                                            <select name="cabang" id="cabang" class="form-control">
                                                <option value="" selected disabled>Pilih Cabang</option>
                                                @foreach ($cabangs as $cabang)
                                                    <option value="{{ $cabang->id }}" @if (old('cabang', $user->id_cabang) == $cabang->id) selected @endif>{{ $cabang->nama_cabang }} - {{ $cabang->kota }}</option>
                                                @endforeach
                                            </select>
                                                @error('cabang')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="kota">Kota Lahir <span class="text-danger">*</span></label>
                                            <select name="kota" id="kota" class="form-control choices">
                                                <option value="" selected disabled>Pilih Kota Anda</option>
                                                @foreach ($provincys as $provincy)
                                                <optgroup label="{{ $provincy['provinsi'] }}">
                                                    @foreach ($provincy['kota'] as $kota)
                                                        <option value="{{ $kota }}"  @if (old('kota', $user->kota ) == $kota) selected @endif>{{ $kota }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                                @error('kota')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="role">Role <span class="text-danger">*</span></label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="" selected disabled>Pilih Role</option>
                                                <option value="OC"  @if (old('role', $user->role ) == 'OC') selected @endif>Operator Cabang</option>
                                                <option value="PC" @if (old('role', $user->role ) == 'PC') selected @endif>Pelaksana Cabang</option>
                                                <option value="K" @if (old('role', $user->role ) == 'K') selected @endif>Kurir</option>
                                                <option value="C" @if (old('role', $user->role ) == 'C') selected @endif>Customer</option>
                                                <option value="D" @if (old('role', $user->role ) == 'D') selected @endif>Direktur</option>
                                            </select>
                                                @error('role')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat Cabang">{{ old('alamat', $user->alamat_lengkap) }}</textarea>
                                                @error('alamat')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password">Password </label>
                                            <input type="password" id="password" class="form-control"
                                                placeholder="Masukan Username" name="password" ">
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="re-password"> Re Password </label>
                                            <input type="password" id="re-password" class="form-control"
                                                placeholder="Masukan Username" name="re-password">
                                                @error('re-password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        {{-- end isi konten --}}
    </section>
</div>

@endsection
