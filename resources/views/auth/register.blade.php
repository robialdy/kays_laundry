<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>

  <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">

  {{-- extensi --}}
    {{-- extension --}}
  <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="auth">

<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="{{ asset('assets/file/img/logo_kays_jpg.jpg') }}" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Daftar.</h1>
            <p class="auth-subtitle mb-5">Silahkan Mendaftar.</p>

            <form action="{{ route('auth.register.sign-in') }}" method="post">
                @csrf

                <div class="form-group position-relative mb-4">
                    <input type="text" class="form-control form-control-lg" placeholder="Masukan Nama" name="nama" value="{{ old('nama') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group position-relative mb-4">
                    <input type="text" class="form-control form-control-lg" placeholder="Masukan Username" name="username" value="{{ old('username') }}">
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group position-relative mb-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                        <input type="text" class="form-control form-control-lg" placeholder="Masukan No Hp" name="no_hp" value="{{ old('no_hp') }}">
                    </div>
                    @error('no_hp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group position-relative mb-4">
                    <select name="cabang" id="cabang" class="form-control form-control-lg">
                        <option value="" selected disabled>Pilih Cabang</option>
                        @foreach ($cabangs as $cabang)
                            <option value="{{ $cabang->id }}" @if (old('cabang') == $cabang->id) selected @endif>{{ $cabang->nama_cabang }} - {{ $cabang->kota }}</option>
                        @endforeach
                    </select>
                        @error('cabang')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group position-relative mb-4">
                    <select name="kota" id="kota" class="form-control form-control-lg choices">
                        <option value="" selected disabled>Pilih Kota Tempat Tinggal</option>
                        @foreach ($provincys as $provincy)
                        <optgroup label="{{ $provincy['provinsi'] }}">
                            @foreach ($provincy['kota'] as $kota)
                                <option value="{{ $kota }}"  @if (old('kota') == $kota) selected @endif>{{ $kota }}</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                        @error('kota')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group position-relative mb-4">
                    <textarea name="alamat" class="form-control form-control-lg" placeholder="Masukan Alamat Anda">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group position-relative mb-4">
                    <input type="password" id="password" class="form-control form-control-lg"
                        placeholder="Masukan Password" name="password" ">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>

                <div class="form-group position-relative mb-4">
                    <input type="password" id="re-password" class="form-control"
                        placeholder="Masukan Re Password" name="re-password">
                        @error('re-password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>


                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">have an account? <a href="{{ route('login') }}" class="font-bold">Sign
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
            <img
            src="{{ asset('assets/file/img/logo_kays.png') }}"
            alt="bg"
            class="img-fluid w-100 h-80 object-fit-cover" style="object-position: right center">
        </div>
    </div>
</div>

    </div>


        <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

    {{-- extensi --}}

    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/form-element-select.js') }}"></script>

</body>

</html>
