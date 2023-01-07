@extends('main')

@section('judul')
    Halaman Edit Data User
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
            <form enctype="multipart/form-data" method="POST" action="{{ url('/home/update') }}">
                @csrf
                @method('PUT')
                <table class="table table-striped table-sm">
                    <tr>
                        <td>Id :</td>
                        <td>
                            <input type="text" name="id" id="id" value="{{ $id }}" readonly
                                style="cursor: not-allowed form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Departemen :</td>
                        <td>
                            <input class="form-control" type="text" name="dept" id="dept"
                                value="{{ $dept }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Cabang :</td>
                        <td>
                            <input class="form-control" type="text" name="cabang" id="cabang"
                                value="{{ $cabang }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap :</td>
                        <td>
                            <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap"
                                value="{{ $nama_lengkap }}">
                        </td>
                    </tr>

                    <tr>
                        <td>Foto</td>
                        <td>
                            @if ($foto)
                                <img src="{{ asset('/') }}dist/img-usr/{{ Auth::user()->foto }}" class="img-thumbnail"
                                    style="width: 20%">
                            @else
                                <span class="badge badge-danger">Belum Ada Foto</span>
                            @endif

                            <input type="file" accept="image/*" name="foto"
                                class="form-control @error('foto') is-invalid @enderror">
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
                            <button class="btn btn-success" type="submit">
                                Update
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
