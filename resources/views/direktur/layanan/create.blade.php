@extends('template.template-direktur')

@section('title', $title);

@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Cabang</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.direktur') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cabang') }}">Cabang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
                            <form action="{{ route('layanan.store') }}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="no_layanan">No Layanan <span class="text-danger">*</span></label>
                                            <input type="text" id="no_layanan" class="form-control" name="no_layanan" value="{{ $no_layanan }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nama_layanan">Nama Layanan <span class="text-danger">*</span></label>
                                            <input type="text" id="nama_layanan" class="form-control"
                                                placeholder="Masukan Nama Layanan" name="nama_layanan" value="{{ old('nama_layanan') }}">
                                                @error('nama_layanan')
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
