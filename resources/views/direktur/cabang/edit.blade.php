@extends('template.template-direktur')

@section('title', $title);

@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Cabang</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.direktur') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cabang') }}">Cabang</a></li>
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
                            <form action="{{ route('cabang.update', $cabang->id) }}" class="form" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nama_cabang">Nama Cabang <span class="text-danger">*</span></label>
                                            <input type="text" id="nama_cabang" class="form-control"
                                                placeholder="Masukan Nama Cabang" name="nama_cabang" value="{{ old('nama_cabang', $cabang->nama_cabang) }}">
                                                @error('nama_cabang')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="kota">Kota <span class="text-danger">*</span></label>
                                            <select name="kota" id="kota" class="form-control choices">
                                                <option value="" selected disabled>Pilih Kota Anda</option>
                                                @foreach ($provincys as $provincy)
                                                <optgroup label="{{ $provincy['provinsi'] }}">
                                                    @foreach ($provincy['kota'] as $kota)
                                                        <option value="{{ $kota }}" @if (old('kota', $cabang->kota) == $kota) selected @endif>{{ $kota }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                                @error('kota')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat Cabang">{{ old('alamat', $cabang->alamat) }}</textarea>
                                                @error('alamat')
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
