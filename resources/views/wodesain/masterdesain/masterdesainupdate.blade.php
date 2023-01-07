@extends('main')

@section('judul')
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='/wodesain/masterdesain'">
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
            <form enctype="multipart/form-data" method="POST" action="{{ route('update.action') }}">
                @if (session()->has('errors'))
                    @foreach ($errors->all() as $err)
                        <div class="alert alert-danger alert dismissible fade show" role="alert" id="danger-alert">
                            <strong>{{ $err }}
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif
                @csrf
                <table class="table table-striped table-sm">
                    <tr>
                        <td>Id Desain</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control" name="id" id="id"
                                value="{{ $id . ' (' . caricabang($id_cabang) . ')' }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Merek</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control" name="merek" id="merek"
                                value="{{ $merek }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Produk</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control" name="namaproduk" id="namaproduk"
                                value="{{ $produk . ' (' . $kode . ')' }}" readonly>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                    </tr>

                    <tr>
                        <td>Master Desain</td>
                        <td>:</td>
                        <td>
                            @if (file_exists('storage/uploads/wo/masterdesain/' . cabang() . '/' . $masterdesain))
                                <a href="{{ asset('storage/uploads/wo/masterdesain/' . cabang() . '/' . $masterdesain) }}"
                                    class="fancybox" data-fancybox="gallery2" data-caption="{{ $produk . ' ' . cabang() }}">
                                    <img src="/storage/uploads/wo/masterdesain/{{ cabang() }}/{{ $masterdesain }}"
                                        class="img-thumbnail" style="width: 20%">
                                </a>
                            @else
                                <span class="badge badge-danger">Belum Ada Master Desain</span><br><br>
                            @endif

                            <input type="file" accept="image/*" name="masterdesain"
                                class="form-control @error('masterdesain') is-invalid @enderror">
                            <input type="hidden" name="last_edit" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="kodeproduk" value="{{ $kode }}">
                            @error('masterdesain')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td></td>
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
