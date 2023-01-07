@extends('main')

@section('judul')
@endsection
@section('isi')
    <?php
    $cabang = Auth::user()->cabang;
    $dept = Auth::user()->dept;
    ?>
    <title>App Central - PTPP Untuk {{ $dept }}</title>
    <section class="content-header" style="margin-top: -3%;">
        {{-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PTPP (CONFIRM)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/layout/home' }}">Home</a></li>
                        <li class="breadcrumb-item active">PTPP (CONFIRM)</li>
                    </ol>
                </div>
            </div>
        </div> --}}

        {{ Breadcrumbs::render('untuk') }}
    </section>
    <div class="card">
        {{-- <div class="card-header">
            <h3 class="card-title">
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div> --}}
        <div class="card-body">
            <p>
                @if (session('msg'))
                    {{ session('msg') }} <br><br>
                @endif
            </p>

            <table id="untuk" class="table table-sm table-bordered table-striped user_datatable"
                style="text-align: center;">
                <thead>
                    <th> Nomor</th>
                    <th> Bulan</th>
                    <th> Dari</th>
                    <th> Kepada</th>
                    <th> Tanggal PTPP</th>
                    <th> Target Selesai</th>
                    <th> Obyek</th>
                    <th> Bukti Close</th>
                    <th> Status</th>
                    <th> Aksi </th>
                </thead>

                <tbody>
                    @foreach (arrayakses() as $a)
                        @foreach ($$a as $d)
                            <tr>
                                <td>{{ $d->nomor }}</td>
                                <td>{{ $d->bulan }}</td>
                                <td>{{ $d->d_dept . ' ' . $d->dari }}</td>
                                <td>{{ $d->k_dept . ' ' . $d->kepada }}</td>
                                <td>{{ tgl($d->tgl) }}</td>
                                <td>{{ tgl($d->target_selesai) }}</td>
                                <td style="text-align: left;">{{ limits($d->obyek) }}</td>
                                <td><i class="fa-solid fa-xmark text-danger"></i></td>
                                <td>
                                    @if ($d->status == 'draft')
                                        <span style="font-size: 1em;" class="badge badge-secondary">DRAFT</span>
                                    @elseif ($d->status == 'confirm')
                                        <span style="font-size: 1em;" class="badge badge-primary">CONFIRM</span>
                                    @elseif ($d->status == 'confbm')
                                        <span style="font-size: 1em;" class="badge bg-purple">CONFIRM BM</span>
                                    @elseif ($d->status == 'unclose')
                                        <span style="font-size: 1em;" class="badge badge-danger">UNCLOSE</span>
                                    @elseif ($d->status == 'close')
                                        <span style="font-size: 1em;" class="badge badge-success">CLOSE</span>
                                    @elseif ($d->status == 'cancel')
                                        <span style="font-size: 1em;" class="badge badge-dark">CANCEL</span>
                                    @elseif ($d->status == 'ditolak')
                                        <span style="font-size: 1em;" class="badge badge-dark">DITOLAK</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" type="button" style="zoom: 80%"
                                        onclick="window.location='/layout/detail/{{ $d->kode }}?b=untuk'">
                                        <i class="fas"> Detail</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(function() {
            $("#untuk").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [
                    [1, 'desc'],
                    [0, 'desc'],
                ],
                "columnDefs": [{
                        "orderable": false,
                        "targets": 8,
                    },
                    {
                        "targets": 1,
                        "visible": false,
                        "searchable": false,
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection