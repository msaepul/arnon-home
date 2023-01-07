@extends('main')

@section('judul')
    {{ Breadcrumbs::render('wohome') }}
@endsection

@section('isi')
    <title>Home App ~ WO Desain - Dashboard</title>
    <?php
    $cabang = cabang();
    $nama = Auth::user()->nama_lengkap;
    $dept = Auth::user()->dept;
    $level = Auth::user()->level;
    ?>
    @if ($masterdesain != 0)
        <div id="cekmasterdesain" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-weight: bold;">{{ $masterdesain }} Master Desain Belum
                            diupload
                        </h5>
                    </div>
                    <div class="modal-body text-center">
                        <p>Halo {{ $nama }}, <br>Ada {{ $masterdesain }} Master Desain Cabang {{ $cabang }}
                            Masih belum selesai diupload. <br> Silahkan mengupload seluruh master desain produk (gambar
                            desain yang saat ini digunakan), atau menghapus produk yang tidak ada dicabang
                            {{ $cabang }}.
                        </p>
                        <span class="badge badge-light">Klik disini untuk upload master desain</span><br>
                        <a href="{{ route('masterdesain') }}">
                            <button class="btn btn-primary ml-3">Klik Disini</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-file"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                MENUNGGU KONFIRMASI
                            </span>
                            <span class="info-box-number">
                                {{ $mk }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-file-signature"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                SEDANG DIPROSES
                            </span>
                            <span class="info-box-number">
                                {{ $sd }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-pen"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                PROSES VALIDASI
                            </span>
                            <span class="info-box-number">
                                {{ $pv }}
                            </span>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-circle-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                SELESAI
                            </span>
                            <span class="info-box-number">
                                {{ $sl }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i
                                class="fa-solid fa-file-circle-question"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                PENDING
                            </span>
                            <span class="info-box-number">
                                {{ $pd }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-file-circle-xmark"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                DITOLAK
                            </span>
                            <span class="info-box-number">
                                {{ $dt }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-check-double"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                TOTAL WO {{ cabang() }}
                            </span>
                            <span class="info-box-number">
                                {{ $tl }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert dismissible fade show" role="alert" id="success-alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <script>
        $(document).ready(function() {
            $("#cekmasterdesain").modal({
                backdrop: 'static',
                keyboard: false,
                modal: 'show',
            });
        });
    </script>
@endsection
