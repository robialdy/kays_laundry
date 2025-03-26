@extends('template.template-direktur')

@section('title', $title);

@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Paket</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Paket</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

<div class="text-end mb-3">
    <a href="{{ route('paket.create') }}" class="btn btn-primary">Tambah Paket</a>
</div>

    <section class="section">
        {{-- isi konten --}}
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Table
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Layanan</th>
                                <th>Nama Satuan</th>
                                <th>Barang</th>
                                <th>nama_paket</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pakets as $paket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paket->layanan->nama_layanan }}</td>
                                <td>{{ $paket->nama_satuan }}</td>
                                <td>{{ $paket->barang }}</td>
                                <td>{{ $paket->nama_paket }}</td>
                                <td>Rp. {{ number_format($paket->harga, 2) }}</td>
                                <td>
                                    <a href="{{ route('paket.edit', $paket->id) }}" class="btn btn-link">Edit</a>
                                    <form action="{{ route('paket.delete', $paket->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger" onclick="return confirm('yakin ingin menghapus paket?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- end isi konten --}}
    </section>
</div>

@endsection
