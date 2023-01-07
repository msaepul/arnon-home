@extends('main')

@section('judul')
@endsection

@section('isi')
    <title>App Central - Buat Komunikasi Internal</title>
    <?php
    $jumlahakses = count(arrayakses());
    $cabang = cabang();
    $nama = Auth::user()->nama_lengkap;
    $dept = Auth::user()->dept;
    $level = Auth::user()->level;
    ?>
    <section class="content-header" style="margin-top: -3%; margin-bottom: -1%;">
        {{-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buat PTPP Eksternal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/layout/home' }}">Home</a></li>
                        <li class="breadcrumb-item active">Buat PTPP</li>
                    </ol>
                </div>
            </div>
        </div> --}}

        {{ Breadcrumbs::render('komint') }}
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form enctype="multipart/form-data" class="form-horizontal" method="POST"
                    action="{{ route('addkomint.action') }}">
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


                    <input type="hidden" name="tgl" id="tgl" value="{{ date('d-m-Y') }}">
                    <input type="hidden" name="bulan" id="bulan" value="{{ date('ym') }}">
                    <input type="hidden" name="dari" id="dari" value="{{ Auth::User()->id }}">
                    <input type="hidden" name="jenis" id="jenis" value="0">
                    <input type="hidden" name="last_edit" id="last_edit" value="{{ Auth::User()->id }}">


                    <div class="card card-light">
                        <div class="card-header">
                            <div class="form-group row" style="margin-bottom: -1%">
                                <div class="col-sm-6">
                                    <img src="/storage/jordan.png" style="width: 25%">
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="text-right"><br>SIS–03 Rev. 00</h6>
                                </div>
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="text-md-center"><b>KOMUNIKASI INTERNAL {{ $cabang }}</b></h5>
                                    <h6 class="text-md-center">
                                        No..../KOM/{{ cabang() }}/.../{{ tgl_id($monthnow) . '/' . $yearnow }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="addinternal" style="border: 5px double"
                                class="table table-valign-middle table-sm table-bordered text-center">
                                <tr>
                                    <th style="width: 4%">TGL</th>
                                    <td style="width: 20%">{{ date('d-m-Y') }}</td>
                                    <td style="width: 1%" rowspan="4">K E P A D A</td>
                                    <td style="width: 25%" rowspan="4">
                                        <div class="select2-info">
                                            <select multiple="multiple" data-placeholder="Pilih Cabang"
                                                data-dropdown-css-class="select2-info"
                                                class="form-control select2 @error('k_cabang') is-invalid @enderror
                                                form-control-border"
                                                name="k_cabang[]" id="k_cabang">
                                                @foreach ($dataCabang as $cabang)
                                                    <option value="{{ $cabang->cabang }}"
                                                        @if (old('k_cabang') == $cabang->cabang) selected @endif>
                                                        {{ $cabang->cabang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('k_cabang')
                                            <div class="text-sm text-red">Silahkan Pilih Minimal 1 Cabang</div>
                                        @enderror
                                        <span class="text-sm">Gunakan Ctrl untuk memilih banyak data</span>
                                    </td>
                                    <td style="width: 25%" rowspan="4">
                                        <div class="select2-primary">
                                            <select multiple="multiple" data-placeholder="Pilih Departemen"
                                                data-dropdown-css-class="select2-primary"
                                                class="form-control select2 @error('k_dept') is-invalid @enderror
                                            form-control-border"
                                                name="k_dept[]" id="k_dept">
                                                @foreach ($dataDept as $d)
                                                    <option value="{{ $d->dept }}"
                                                        @if (old('k_dept') == $d->dept) selected @endif>
                                                        {{ $d->dept }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('k_dept')
                                            <div class="text-sm text-red">Silahkan Pilih Minimal 1 Dept</div>
                                        @enderror
                                        <span class="text-sm">Gunakan Ctrl untuk memilih banyak data</span>
                                    </td>
                                    <td style="width: 25%" rowspan="4">
                                        <div class="select2-success">
                                            <select multiple="multiple" data-placeholder="Pilih Nama Lengkap"
                                                data-dropdown-css-class="select2-success"
                                                class="form-control select2 
                                            form-control-border"
                                                name="kepada[]" id="kepada">
                                                @foreach ($dataUser as $u)
                                                    <option value="{{ $u->id }}"
                                                        @if (old('kepada[]') == $u->nama_lengkap) selected @endif>
                                                        {{ $u->nama_lengkap . ' ( ' . $u->dept . ' - ' . caricabang($u->cabang) . ' ) ' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('kepada')
                                            <div class="text-sm text-red">Silahkan Pilih Nama Lengkap</div>
                                        @enderror
                                        <span class="text-sm">Ketik Nama, cabang atau dept</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dari</th>
                                    <td>{{ $nama }}</td>
                                </tr>
                                <tr>
                                    <th>Dept</th>
                                    <td>
                                        @if ($jumlahakses > 1)
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" name="d_cabang" id="d_cabang"
                                                        class="form-control form-control-border"
                                                        value="{{ cabang() }}" readonly>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select
                                                        class="form-control @error('d_dept') is-invalid @enderror form-control-border"
                                                        name="d_dept" id="d_dept">
                                                        <option disabled selected>...</option>
                                                        @foreach (arrayakses() as $a)
                                                            <option value="{{ $a }}"
                                                                @if (old('d_dept') == $a) selected @endif>
                                                                {{ $a }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @else
                                            {{ cabang() . ' - ' . $dept }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hal</th>
                                    <td>
                                        <textarea name="hal" id="hal" class="form-control @error('hal') is-invalid @enderror" rows="3"
                                            cols="40" style="resize: none;">{{ old('hal') }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <b style="float: left">DESKRIPSI :</b>

                                        <div class="form-group row" style="margin-left: 2%; margin-top: 2%;">
                                            <div class="col-sm-12">
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi"
                                                    rows="3"style="resize: none;">{{ old('deskripsi') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row" style="margin-left: 2%; margin-top: 1%;">
                                            <label for="waktu" class="col-sm-2 col-form-label left">
                                                <b style="float: left">Hari / Tgl</b>
                                                &nbsp;:</label>
                                            <div class="col-sm-5">
                                                <input type="date"
                                                    class="form-control @error('waktu') is-invalid @enderror"
                                                    name="waktu" id="waktu" value="{{ old('waktu') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-left: 2%">
                                            <label for="darijam" class="col-sm-2 col-form-label">
                                                <b style="float: left">Waktu</b>
                                                &nbsp; &nbsp; &nbsp;:</label>
                                            <div class="col-sm-2">
                                                <input type="time"
                                                    class="form-control @error('darijam') is-invalid @enderror"
                                                    name="darijam" id="darijam" value="{{ old('darijam') }}">
                                            </div>
                                            <label for="sampaijam" class="col-sm-1 col-form-label">s/d</label>
                                            <div class="col-sm-2">
                                                <input type="time"
                                                    class="form-control @error('sampaijam') is-invalid @enderror"
                                                    name="sampaijam" id="sampaijam" value="{{ old('sampaijam') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-left: 2%">
                                            <label for="tempat" class="col-sm-2 col-form-label">
                                                <b style="float: left">Tempat</b>
                                                &nbsp; &nbsp;:</label>
                                            <div class="col-sm-5">
                                                <input type="text"
                                                    class="form-control @error('tempat') is-invalid @enderror"
                                                    name="tempat" id="tempat" value="{{ old('tempat') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row" style="margin-left: 2%; margin-top: 2%;">
                                            <div class="col-sm-12">
                                                <textarea class="form-control @error('deskripsi2') is-invalid @enderror" name="deskripsi2" id="deskripsi2"
                                                    rows="3"style="resize: none;">{{ old('deskripsi2') }}</textarea>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="tempat" class="col-sm-2 col-form-label">
                                                <b>Terimakasih</b>
                                            </label>
                                            <div class="col-sm-10">
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <label for="tempat" class="col-sm-2 col-form-label">
                                                <b>{{ Auth::User()->nama_lengkap }}</b>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <center>
                            <button type="submit" class="btn btn-info">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        $(function() {
            $('#artist').change(function() {
                $.ajax({
                    dataGetbyId: "produk",
                    dataType: "html",
                    type: "post",
                    success: function(data) {
                        $('#artist').append(data);
                    }
                });
            });
        });

        $(document).ready(function() {
            $("#produk").children('option:gt(0)').hide();
            $("#merek").change(function() {
                $("#produk").children('option').hide();
                $("#produk").children("option[value^=" + $(this).val() + "]").show()
            })
        })

        function hide() {
            var cabang = document.getElementById('cabang');
            cabang.style.visibility = 'hidden';
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#cekmasterdesain").modal({
                backdrop: 'static',
                keyboard: false,
                modal: 'show',
            });
        });
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

        })
    </script>
@endsection
