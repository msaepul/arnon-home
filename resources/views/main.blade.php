<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('/storage/central2.png') }}" type="image/x-icon">
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <script src="{{ asset('/') }}dist/js/fontawesome.js" crossorigin="anonymous"></script>
    <!-- Costum -->
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/custom.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/googleapis.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css?v=3.2.0">
    <!-- Loading style -->
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/loading.css">
    <!-- jQuery library -->
    <script src="{{ asset('/') }}dist/js/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/jquery.fancybox.css">
    <script src="{{ asset('/') }}dist/js/jquery.fancybox.min.js"></script>
</head>

<body class="hold-transition sidebar-mini preload">

    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('sidebar')
        <!-- /.Main Sidebar Container -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                @yield('judul')
                            </h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                @yield('isi')
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer text-sm">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    {{-- <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script> --}}

    {{-- <script src="{{ asset('/') }}dist/js/jquery.min.js"></script> --}}

    <!-- Data Tables -->
    <script src="{{ asset('/') }}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}plugins/select2/js/select2.full.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>

    <script src="{{ asset('/') }}plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        $(".alert").delay(3000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <!-- MODAL export All Cabang -->
    @php
        $bulanini = date('m');
        $tahunini = date('y');
    @endphp
    <div id="exportall" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Export PTPP All Cabang </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="GET" id="insert_form" action="{{ route('export') }}">
                        <label>Pilih Bulan</label>
                        <select name="bulan" id="bulan" class="form-control" required>
                            <option value="01" @if ($bulanini == '01') selected @endif>JANUARI</option>
                            <option value="02" @if ($bulanini == '02') selected @endif>FEBUARY</option>
                            <option value="03" @if ($bulanini == '03') selected @endif>MARET</option>
                            <option value="04" @if ($bulanini == '04') selected @endif>APRIL</option>
                            <option value="05" @if ($bulanini == '05') selected @endif>MEI</option>
                            <option value="06" @if ($bulanini == '06') selected @endif>JUNI</option>
                            <option value="07" @if ($bulanini == '07') selected @endif>JULI</option>
                            <option value="08" @if ($bulanini == '08') selected @endif>AGUSTUS</option>
                            <option value="09" @if ($bulanini == '09') selected @endif>SEPTEMBER</option>
                            <option value="10" @if ($bulanini == '10') selected @endif>OKTOBER</option>
                            <option value="11" @if ($bulanini == '11') selected @endif>NOVEMBER</option>
                            <option value="12" @if ($bulanini == '12') selected @endif>DESEMBER</option>
                        </select>
                        <label>Pilih Tahun</label>
                        <select name="tahun" id="tahun" class="form-control" required>
                            <option value="21" @if ($tahunini == '21') selected @endif>2021</option>
                            <option value="22" @if ($tahunini == '22') selected @endif>2022</option>
                            <option value="23" @if ($tahunini == '23') selected @endif>2023</option>
                        </select>
                        @if (Auth::user()->cabang != 'HO')
                            <label>Pilih Jenis PTPP</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="internal">INTERNAL</option>
                                <option value="eksternal">EKSTERNAL</option>
                            </select>
                        @endif
                        <br><br>
                        <input type="submit" name="insert" id="insert" value="Export Data"
                            class="btn btn-success" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(window).on("load", function() {
            $("body").removeClass("preload");
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>

</html>
