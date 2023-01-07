@extends('main')

@section('judul')
@endsection

@section('isi')
    <title>Home App - Detail WO Desain</title>
    @php
        $cabang = cabang();
        $dept = Auth::user()->dept;
        $iduser = Auth::user()->id;
        $b = $_GET['b'];
        if ($b == '0') {
            $before = 'wodesain';
            $bname = 'Perubahan Desain';
        } elseif ($b == '1') {
            $before = 'woukuran';
            $bname = 'Perubahan Ukuran';
        } elseif ($b == '2') {
            $before = 'wobaru';
            $bname = 'Desain Baru';
        }
    @endphp
    <section class="content-header" style="margin-top: -3%;">
        {{ Breadcrumbs::render('desaindetail', $utama) }}
    </section>
    @if (session('success'))
        <div class="alert alert-success alert dismissible fade show" role="alert" id="success-alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card card-navy">
        <div class="card-header">
            {{-- <a href="{{ url('/close/' . $kode) }}" onclick="return confirm('Yakin Akan Menyelsaikan PTPP ?')">
                <button type="button" class="btn btn-danger">
                    <i class="fa-solid fa-check-to-slot"></i>
                    <span>Close</span>
                </button>
            </a> --}}
            <button type="button" class="btn btn-light disabled">
                <i class="fa-solid fa-pen-to-square"></i>
                <span>Edit</span>
            </button>
            <span style="float: right;">
                <label class="wtf wtf-danger wtf-arrow-navy selected">
                    MENUNGGU KONFIRMASI
                </label>
            </span>
            {{-- <span style="float: right;">
                @if ($status == 'cancel')
                    <label class="wtf wtf-danger wtf-arrow-right selected">
                        CANCEL
                    </label>
                @elseif ($status == 'ditolak')
                    <label class="wtf wtf-danger wtf-arrow-right selected">
                        DITOLAK
                    </label>
                @else
                    <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'draft') selected @endif">
                        DRAFT
                    </label>

                    <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'confirm') selected @endif">
                        CONFIRM
                    </label>

                    @if ($jenis == 'internal')
                        <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'confbm') selected @endif">
                            ACC BM
                        </label>
                    @endif

                    @if ($status == 'close')
                        <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'close') selected @endif">
                            CLOSE
                        </label>
                    @else
                        <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'unclose') selected @endif">
                            UNCLOSE
                        </label>
                    @endif
                @endif
            </span> --}}
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-navy">
                    <div class="card-header">
                        <h3 class="card-title">Detail {{ $bname . ' ' . ucwords(strtolower(cabangs())) }} </h3>
                    </div>
                    <div class="card-body" style="zoom: 80%">

                        <div class="form-group row">
                            <label for="nomor" class="col-sm-1 col-form-label">Nomor WO</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">
                                    {{ $nomor }}
                                </span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="jenis" class="col-sm-1 col-form-label">Jenis WO</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">{{ $bname }}</span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="jenis" class="col-sm-1 col-form-label">Tanggal WO</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">{{ $tgl }}</span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nomor" class="col-sm-1 col-form-label">Cabang</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">{{ $cabang }}</span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="jenis" class="col-sm-1 col-form-label">Merek</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">{{ $merek }}</span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="jenis" class="col-sm-1 col-form-label">Produk</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">{{ $produk }}</span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nomor" class="col-sm-1 col-form-label">Izin Edar</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">{{ $izinedar }}</span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="jenis" class="col-sm-1 col-form-label">Nomor Halal</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">{{ $mui }}</span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="jenis" class="col-sm-1 col-form-label">Terakhir diedit</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">{{ lastedit($last_edit) }}</span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nomor" class="col-sm-1 col-form-label">Komunikasi</label>
                            <div class="col-sm-3">
                                <textarea class="form-control form-control-border">{{ $komunikasi }}</textarea>
                            </div>
                            <label for="nomor" class="col-sm-1 col-form-label">Deskripsi</label>
                            <div class="col-sm-3">
                                <textarea class="form-control form-control-border">{{ $deskripsi }}</textarea>
                            </div>

                            <div class="col-sm-4 text-center">
                                <b>Desain yang digunakan {{ $cabang }}</b>
                                <a href="{{ asset('storage/uploads/wo/masterdesain/' . $cabang . '/' . $masterdesain) }}"
                                    class="fancybox" data-fancybox="gallery1"
                                    data-caption="Master Desain {{ $kode }} - {{ $cabang }}">
                                    <img src="{{ asset('storage/uploads/wo/masterdesain/' . $cabang . '/' . $masterdesain) }}"
                                        width="100%" height="80%">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="cancelModalLabel">Alasan PTPP Dibatalkan : </h4>
                        </div>
                        <form method="post" id="insert_form" action="">
                            @csrf
                            <div class="modal-body">
                                <textarea class="form-control" name="alasan" id="alasan" style="width: 100%; height: 134px; resize: none;"
                                    minlength="15" maxlength="755" placeholde="Berikan Alasan Pembatalan PTPP" required></textarea>
                                <div class="modal-footer">
                                    <input type="submit" name="insert" id="insert" value="SAVE"
                                        class="btn btn-link waves-effect" />
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal"
                                        style="opacity: 0.6; color: gray;">CLOSE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="tolakModalLabel">Alasan Analisa PTPP ditolak : </h4>
                        </div>
                        <form method="post" id="insert_form" action="">
                            @csrf
                            <div class="modal-body">
                                <textarea class="form-control" name="alasan" id="alasan" style="width: 100%; height: 134px; resize: none;"
                                    minlength="15" maxlength="755" placeholde="Berikan Alasan Pembatalan PTPP" required></textarea>
                                <div class="modal-footer">
                                    <input type="submit" name="insert" id="insert" value="SAVE"
                                        class="btn btn-link waves-effect" />
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal"
                                        style="opacity: 0.6; color: gray;">CLOSE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
