@extends('main')

@section('judul')
    {{ Breadcrumbs::render('home') }}
@endsection

@section('isi')
    <title>
        App Central - Dashboard</title>
    <?php
    $cabang = cabang();
    $dept = Auth::user()->dept;
    $dept = Auth::user()->dept;
    $level = Auth::user()->level;
    $monthnow = date('F');
    $cb = 0;
    $cn = 0;
    ?>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 @if ($level == 'cabang') col-md-3 @else col-md-2 @endif">
                    <a href="{{ url('layout/list/draft') }}" style="color: black">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-file"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Draft
                                </span>
                                <span class="info-box-number">
                                    @if ($draft != null)
                                        {{ $dr = count($draft) }}
                                    @else
                                        {{ $dr = 0 }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                @if ($level == 'cabang')
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ url('layout/list/cancel') }}" style="color: black">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-orange elevation-1"><i
                                        class="fas fa-file-circle-xmark"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        Cancel
                                    </span>
                                    <span class="info-box-number">
                                        @if ($cancel != null)
                                            {{ $cn = count($cancel) }}
                                        @else
                                            {{ $cn = 0 }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif

                <div class="col-12 col-sm-6 @if ($level == 'cabang') col-md-3 @else col-md-2 @endif">
                    <a href="{{ url('layout/list/ditolak') }}" style="color: black">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i
                                    class="fa-solid fa-file-circle-question"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Ditolak
                                </span>
                                <span class="info-box-number">
                                    @if ($ditolak != null)
                                        {{ $dt = count($ditolak) }}
                                    @else
                                        {{ $dt = 0 }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 @if ($level == 'cabang') col-md-3 @else col-md-2 @endif">
                    <a href="{{ url('layout/list/confirm') }}" style="color: black">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-pen"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Confirm
                                </span>
                                <span class="info-box-number">
                                    @if ($confirm != null)
                                        {{ $cr = count($confirm) }}
                                    @else
                                        {{ $cr = 0 }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                @if ($level == 'cabang')
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ url('layout/list/confbm') }}" style="color: black">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-file-signature"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        Confirm BM
                                    </span>
                                    <span class="info-box-number">
                                        @if ($confbm != null)
                                            {{ $cb = count($confbm) }}
                                        @else
                                            {{ $cb = 0 }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif

                <div class="col-12 col-sm-6 @if ($level == 'cabang') col-md-3 @else col-md-2 @endif">
                    <a href="{{ url('layout/list/unclose') }}" style="color: black">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-purple elevation-1"><i
                                    class="fas fa-file-circle-exclamation"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Unclose
                                </span>
                                <span class="info-box-number">
                                    @if ($unclose != null)
                                        {{ $un = count($unclose) }}
                                    @else
                                        {{ $un = 0 }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 @if ($level == 'cabang') col-md-3 @else col-md-2 @endif">
                    <a href="{{ url('layout/list/close') }}" style="color: black">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fas fa-file-circle-check"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Close
                                </span>
                                <span class="info-box-number">
                                    @if ($close != null)
                                        {{ $cl = count($close) }}
                                    @else
                                        {{ $cl = 0 }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 @if ($level == 'cabang') col-md-3 @else col-md-2 @endif">
                    @if ($dept == 'SIS' || $dept == 'BM')
                        <a href="{{ url('layout/all') }}" style="color: black">
                    @endif
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-check-double"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                Total
                            </span>
                            <span class="info-box-number">
                                {{ $dr + $dt + $cr + $un + $cl + $cb + $cn }}
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

    @if (warning() >= 1)
        <div class="alert alert-light text-danger" style="font-size: 180%; margin-left:10%; margin-right:10%;"
            id="danger-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <i class="fa-solid fa-triangle-exclamation"></i> &nbsp; Ada <strong> {{ warning() }} </strong> PTPP yang
            Belum
            Dianalisa Lebih
            Dari 3 Hari <i class="fa-solid fa-exclamation"></i> <a class="text-info" href="{{ route('layout.lateptpp') }}">
                Lihat Detail PTPP </a>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="margin-left: 40%">
                Grafik PTPP || Periode : {{ $monthnow }}
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



            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Jumlah PTPP {{ $cabang }} All Departemen</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="ho"></canvas>
                            </div>
                        </div>

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Jumlah PTPP per Cabang All Departemen</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="perCabang"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Jumlah PTPP Departemen All Cabang</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="allCabang"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
            <script>
                var ctx = document.getElementById('allCabang').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: ['MKT', 'PRC', 'PBL', 'GBB', 'PRO', 'ENG', 'QCT', 'GPJ', 'EKS', 'KND', 'FIN', 'ACC', 'HRD',
                            'SIS', 'EDP', 'TAX', 'GRR'
                        ],
                        datasets: [{
                            label: 'Jumlah PTPP',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'black',
                            data: [{{ count($MKT) }}, {{ count($PRC) }}, {{ count($PBL) }},
                                {{ count($GBB) }}, {{ count($PRO) }}, {{ count($ENG) }},
                                {{ count($QCT) }}, {{ count($GPJ) }}, {{ count($EKS) }},
                                {{ count($KND) }}, {{ count($FIN) }}, {{ count($ACC) }},
                                {{ count($HRD) }}, {{ count($SIS) }}, {{ count($EDP) }},
                                {{ count($TAX) }}, {{ count($GRR) }}
                            ]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });
            </script>
            <script>
                var ctx = document.getElementById('perCabang').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: ['PDL', 'PDLCBL', 'JTW', 'TGL', 'MDO', 'MKS', 'KDR', 'BDJ', 'BWI', 'LPG', 'DMK', 'PLM',
                            'BLI', 'PKU', 'MDN', 'LOM', 'PNK', 'LLG', 'PLU', 'KDI', 'AMQ'
                        ],
                        datasets: [{
                            label: 'Jumlah PTPP',
                            backgroundColor: 'lightblue',
                            borderColor: 'black',
                            data: [{{ count($PDL) }}, {{ count($CBL) }}, {{ count($JTW) }},
                                {{ count($TGL) }}, {{ count($MDO) }}, {{ count($MKS) }},
                                {{ count($KDR) }}, {{ count($BDJ) }}, {{ count($BWI) }},
                                {{ count($LPG) }}, {{ count($DMK) }}, {{ count($PLM) }},
                                {{ count($BLI) }}, {{ count($PKU) }}, {{ count($MDN) }},
                                {{ count($LOM) }}, {{ count($PNK) }}, {{ count($LLG) }},
                                {{ count($PLU) }}, {{ count($KDI) }}, {{ count($AMQ) }}
                            ]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });
            </script>
            <script>
                var ctx = document.getElementById('ho').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: ['{{ $cabang }}-MKT', '{{ $cabang }}-PRC', '{{ $cabang }}-PBL',
                            '{{ $cabang }}-GBB', '{{ $cabang }}-PRO', '{{ $cabang }}-ENG',
                            '{{ $cabang }}-QCT', '{{ $cabang }}-GPJ', '{{ $cabang }}-EKS',
                            '{{ $cabang }}-KND', '{{ $cabang }}-FIN', '{{ $cabang }}-ACC',
                            '{{ $cabang }}-HRD', '{{ $cabang }}-SIS', '{{ $cabang }}-EDP',
                            '{{ $cabang }}-TAX', '{{ $cabang }}-GRR'
                        ],
                        datasets: [{
                            label: 'Jumlah PTPP',
                            backgroundColor: 'lightgreen',
                            borderColor: 'black',
                            data: [{{ count($CABMKT) }}, {{ count($CABPRC) }}, {{ count($CABPBL) }},
                                {{ count($CABGBB) }}, {{ count($CABPRO) }}, {{ count($CABENG) }},
                                {{ count($CABQCT) }}, {{ count($CABGPJ) }}, {{ count($CABEKS) }},
                                {{ count($CABKND) }}, {{ count($CABFIN) }}, {{ count($CABACC) }},
                                {{ count($CABHRD) }}, {{ count($CABSIS) }}, {{ count($CABEDP) }},
                                {{ count($CABTAX) }}, {{ count($CABGRR) }}
                            ]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });
            </script>
            <script>
                $("#danger-alert").fadeTo(9000000, 500).slideUp(500, function() {
                    $("#danger-alert").slideUp(500);
                });
            </script>
        @endsection
