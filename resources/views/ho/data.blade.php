@extends('main')

@section('judul')
    Halaman Home
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-primary" type="button" onclick="window.location='/home/tambah'">
                    Tambah
                </button>
                <button class="btn btn-info" type="button" onclick="window.location='/home/datasoft'">
                    Tampil Data Hide
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
            <p>
                @if (session('msg'))
                    {{ session('msg') }} <br><br>
                @endif
            </p>

            <form method="GET">
                <div class="formg-roup row">
                    <label for="" class="col-sm-2 col-form-label">
                        Cari Data
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="cari" id="cari" class="form-control"
                            placeholder="Cari Data Berdasarkan Nama Lengkap" autofocus="true" value="{{ $cari }}">
                    </div>
                </div>
            </form>
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <th> No </th>
                    <th> @sortablelink('dept', 'Departemen') </th>
                    <th> @sortablelink('cabang', 'Cabang') </th>
                    <th> @sortablelink('nama-lengkap', 'Nama Lengkap') </th>
                    <th> Aksi </th>
                </thead>

                <tbody>
                    @php
                        $nomor = 1 + ($dataLogin->currentPage() - 1) * $dataLogin->perPage();
                    @endphp
                    @foreach ($dataLogin as $d)
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $d->dept }}</td>
                            <td>{{ $d->cabang }}</td>
                            <td>{{ $d->nama_lengkap }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" type="button"
                                    onclick="window.location='/home/edit/{{ $d->id }}'">
                                    Edit
                                </button>

                                <form method="POST" action="/home/hapus/{{ $d->id }}" style="display: inline"
                                    onsubmit="return hapusData()">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $dataLogin->links() }} --}}
            {!! $dataLogin->appends(Request::except('page'))->render() !!}
            <script>
                function hapusData() {
                    pesan = confirm('Yakin Data ini akan dihapus?');
                    if (pesan)
                        return true;
                    else return false;
                }
            </script>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
