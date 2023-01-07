@extends('main')

@section('judul')
@endsection
@section('isi')
    <title>Home App - Semua WO Ukuran</title>
    <?php
    $no = 1;
    ?>
    <style>
        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            background-color: silver;
        }
    </style>
    <section class="content-header" style="margin-top: -3%;">
        {{ Breadcrumbs::render('wodesain') }}
    </section>
    <div class="card">
        <div class="card-body">
            <p>
                @if (session('msg'))
                    {{ session('msg') }} <br><br>
                @endif
            </p>
            <table id="woall"
                class="table table-valign-middle table-hover table-sm table-border table-striped text-center">
                <thead>
                    <th> Nomor WO</th>
                    <th> Deskripsi</th>
                    <th> Cabang</th>
                    <th> Merek</th>
                    <th> Produk</th>
                    <th> Tanggal WO</th>
                    <th> Status</th>
                    <th> Terakhir diedit</th>
                    <th> Aksi</th>
                </thead>

                <tbody>
                    @php
                        // dd($dataWoall);
                    @endphp
                    @foreach ($dataWodesain as $w)
                        <tr>
                            <td>{{ $w->nomor }}</td>
                            <td style="text-align: left;"
                                @if (strlen($w->deskripsi) > 10) data-toggle="tooltip" data-placement="right"
                                title="{{ $w->deskripsi }}" @endif>
                                {{ limits($w->deskripsi) }}
                            </td>
                            <td>{{ $w->cabang }}</td>
                            <td>{{ $w->merek }}</td>
                            <td>{{ $w->namaproduk . ' ' . $w->kode }}</td>
                            <td>{{ tgl3($w->tgl) }}</td>
                            <td>
                                @if ($w->status == 0)
                                    <span style="font-size: 1em;" class="badge badge-primary">MENUNGGU KONFIRMASI</span>
                                @elseif ($w->status == 1)
                                    <span style="font-size: 1em;" class="badge bg-purple">SEDANG DIPROSES</span>
                                @elseif ($w->status == 2)
                                    <span style="font-size: 1em;" class="badge badge-secondary">PROSES VALIDASI</span>
                                @elseif ($w->status == 3)
                                    <span style="font-size: 1em;" class="badge badge-success">SELESAI</span>
                                @elseif ($w->status == 4)
                                    <span style="font-size: 1em;" class="badge badge-dark">PENDING</span>
                                @elseif ($w->status == 5)
                                    <span style="font-size: 1em;" class="badge badge-danger">DITOLAK</span>
                                @endif
                            </td>
                            <td>{{ lastedit($w->last_edit) }} <br>
                                {{ tgl3(substr($w->created_at, 0, 10)) . ' ' . substr($w->created_at, -8, 5) }}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info" type="button"
                                    onclick="window.location='/wodesain/desain/detail/{{ $w->id }}?b=1'">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-primary" type="button"
                                    onclick="window.location='/layout/detail'">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <script>
        $(function() {
            $("#woall").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [
                    [4, 'desc'],
                ],
                "columnDefs": [{
                    "orderable": false,
                    "targets": 7,
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
