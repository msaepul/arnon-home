@extends('main')

@section('judul')
    {{ Breadcrumbs::render('komhome') }}
@endsection

@section('isi')
    <title>App Central - Dashboard</title>
    <?php
    $cabang = cabang();
    $nama = Auth::user()->nama_lengkap;
    $dept = Auth::user()->dept;
    $level = Auth::user()->level;
    ?>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('layout/list/draft') }}" style="color: black">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-file"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Draft
                                </span>
                                <span class="info-box-number">0
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('layout/list/confirm') }}" style="color: black">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-pen"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Confirm
                                </span>
                                <span class="info-box-number">0
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{ url('layout/list/close') }}" style="color: black">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fas fa-file-circle-check"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Terdistribusi
                                </span>
                                <span class="info-box-number">0
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    @if ($dept == 'SIS' || $dept == 'BM')
                        <a href="{{ url('layout/all') }}" style="color: black">
                    @endif
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-check-double"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                Total Komunikasi {{ cabang() }}
                            </span>
                            <span class="info-box-number">0
                            </span>
                        </div>
                    </div>
                    @if ($dept == 'SIS' || $dept == 'BM')
                        </a>
                    @endif
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
