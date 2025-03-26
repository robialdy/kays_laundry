@extends('template.template-direktur')

@section('title', $title);

@section('content')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.direktur') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

<div class="text-end mb-3">
    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
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
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Cabang</th>
                                <th>No Hp</th>
                                <th>Kota</th>
                                <th>Alamat</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->cabang->nama_cabang }}</td>
                                <td>{{ $user->no_hp }}</td>
                                <td>{{ $user->kota }}</td>
                                <td>{{ $user->alamat_lengkap }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-link">Edit</a>
                                    <form action="{{ route('user.delete', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger" onclick="return confirm('yakin ingin menghapus user?')">Delete</button>
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
