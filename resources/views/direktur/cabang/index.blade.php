@extends('template.template-direktur')

@section('title', $title);

@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboardr</h3>
                <p class="text-subtitle text-muted">Dashboard sini.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

<div class="text-end mb-3">
    <a href="{{ route('cabang.create') }}" class="btn btn-primary">Tambah Cabang</a>
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
                                <th>Nama Cabang</th>
                                <th>Kode</th>
                                <th>Kota</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cabangs as $cabang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cabang->nama_cabang }}</td>
                                <td>{{ $cabang->kode_cabang }}</td>
                                <td>{{ $cabang->kota }}</td>
                                <td>{{ $cabang->alamat }}</td>
                                <td>
                                    <a href="{{ route('cabang.edit', $cabang->kode_cabang) }}" class="btn btn-link">Edit</a>
                                    <form action="{{ route('cabang.delete', $cabang->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger" onclick="return confirm('yakin ingin menghapus cabang?')">Delete</button>
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
