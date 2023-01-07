@extends('main')

@section('judul')
@endsection
@section('isi')
    <title>Home App - Semua WODesain</title>
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
        {{ Breadcrumbs::render('datasudahdihapus') }}
    </section>
    <div class="card">
        <div class="card-body">
            <p>
                @if (session('msg'))
                    {{ session('msg') }} <br><br>
                @endif
            </p>
            <table id="masterdesain"
                class="table table-valign-middle table-hover table-sm table-border table-striped text-center">
                <thead>
                    <th> No</th>
                    <th> Merek</th>
                    <th> Produk</th>
                    <th> Kode</th>
                    <th> Master Desain</th>
                    <th> Terakhir diedit</th>
                    <th> Aksi</th>
                </thead>

                <tbody>
                    @foreach ($dataWoall as $no => $w)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $w->merek }}</td>
                            <td>{{ $w->namaproduk }}</td>
                            <td>{{ $w->kode }}</td>
                            <td>
                                @if ($w->masterdesain == '-')
                                    <span class="badge badge-danger">Belum Ada Master Desain</span>
                                @else
                                    <a href="{{ asset('storage/uploads/wo/masterdesain/' . cabang() . '/' . $w->masterdesain) }}"
                                        class="fancybox" data-fancybox="gallery2"
                                        data-caption="{{ $w->namaproduk . ' ' . cabang() }}">
                                        <button class="btn btn-sm btn-success">
                                            Lihat Desain
                                        </button>
                                    </a>
                                @endif
                            <td>{{ lastedit($w->last_edit) }} <br>
                                {{ tgl3(substr($w->created_at, 0, 10)) . ' ' . substr($w->created_at, -8, 5) }}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning" type="button"
                                    onclick="restore('{{ $w->id }}')">
                                    <i class="fas fa-rotate-left"></i>
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
        function restore(id) {
            pesan = confirm('Yakin Data ini akan di-Restore?');
            if (pesan) {
                window.location = '/wodesain/masterdesain/restore/' + id
            }
        }

        $(function() {
            $("#masterdesain").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [
                    [4, 'asc'],
                ],
                "columnDefs": [{
                    "orderable": false,
                    "targets": 5,
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
