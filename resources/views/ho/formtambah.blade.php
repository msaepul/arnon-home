@extends('layout.main')

@section('judul')
    Halaman Tambah Data User
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='/home/index'">
                    &laquo; Kembali
                </button>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if (session('msg'))
                {{ session('msg') }} <br><br>
            @endif

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <form class="form-group" method="POST" action="{{ url('/home/simpan') }}" enctype="multipart/form-data">
                @csrf
                <table class="table table-sm table-striped" style="widows: 70%">
                    <tr>
                        <td>Departemen :</td>
                        <td>
                            <input class="form-control form-control-sm @error('dept') is-invalid @enderror" type="text"
                                name="dept" id="dept" value="{{ old('dept') }}">
                            @error('dept')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Cabang :</td>
                        <td>
                            <input class="form-control form-control-sm @error('cabang') is-invalid @enderror" type="text"
                                name="cabang" id="cabang" value="{{ old('cabang') }}">
                            @error('cabang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap :</td>
                        <td>
                            <input class="form-control form-control-sm @error('nama_lengkap') is-invalid @enderror"
                                type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td>Upload Foto :</td>
                        <td><input type="file" name="foto" id="foto"
                                class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-sm btn-success" type="submit">
                                Simpan
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
