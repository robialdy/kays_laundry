@extends('template.template-direktur')

@section('title', $title);

@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Paket</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.direktur') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('paket') }}">Paket</a></li>
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
                            <form action="{{ route('paket.update', $paket->id) }}" class="form" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="layanan">Kota <span class="text-danger">*</span></label>
                                            <select name="layanan" id="layanan" class="form-control">
                                                <option value="" selected disabled>Pilih Layanan</option>
                                                @foreach ($layanans as $layanan)
                                                    <option value="{{ $layanan->id }}" @if (old('layanan', $paket->id_layanan) == $layanan->id) selected @endif>{{ $layanan->nama_layanan }}</option>
                                                @endforeach
                                            </select>
                                                @error('layanan')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="satuan">Nama Satuan <span class="text-danger">*</span></label>
                                            <select name="satuan" id="satuan" class="form-control">
                                                <option value="" selected disabled>Pilih Kiloan</option>
                                                <option value="Satuan" @if (old('satuan', $paket->nama_satuan ) == 'Satuan') selected @endif>Satuan</option>
                                                <option value="Kiloan" @if (old('satuan', $paket->nama_satuan) == 'Kiloan') selected @endif>Kiloan</option>
                                            </select>
                                                @error('satuan')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="barang">Nama Barang <span class="text-danger">*</span></label>
                                            <input type="text" id="barang" class="form-control"
                                                placeholder="Masukan Nama Barang" name="barang" value="{{ old('barang', $paket->barang) }}">
                                                @error('barang')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nama_paket">Nama Paket <span class="text-danger">*</span></label>
                                            <input type="text" id="nama_paket" class="form-control"
                                                placeholder="Masukan Nama Paket" name="nama_paket" value="{{ old('nama_paket', $paket->nama_paket) }}">
                                                @error('nama_paket')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="harga">Harga <span class="text-danger">*</span></label>
                                            <input type="number" id="harga" class="form-control"
                                                placeholder="Masukan Harga" name="harga" value="{{ old('harga', $paket->harga) }}">
                                                @error('harga')
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
