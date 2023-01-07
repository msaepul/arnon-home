@extends('main')

@section('judul')
@endsection

@section('isi')
    <title>Home App - Buat WO Perubahan Ukuran Plastik</title>
    <?php
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

        {{ Breadcrumbs::render('woadd') }}
    </section>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-navy">
                    <div class="card-header">
                        <h3 class="card-title">Work Order Perubahan Ukuran Kemasan</h3>
                    </div>
                    <form enctype="multipart/form-data" class="form-horizontal" method="POST"
                        action="{{ route('addwo.action') }}">
                        @if (session()->has('errors'))
                            @foreach ($errors->all() as $err)
                                <div class="alert alert-danger alert dismissible fade show" role="alert"
                                    id="danger-alert">
                                    <strong>{{ $err }}
                                    </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif

                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nomor" class="col-sm-2 col-form-label">Nomor WO Ukuran</label>
                                <div class="col-sm-4">
                                    <span
                                        class="form-control @error('nomor') is-invalid @enderror
                                        form-control-border">
                                        {{ $hasilkode }}
                                    </span>
                                    <input type="hidden" name="nomor" value="{{ $hasilkode }}">
                                </div>
                                <div class="col-sm-1">
                                </div>
                                <label for="merek" class="col-sm-1 col-form-label">Merek</label>
                                <div class="col-sm-4">
                                    <select
                                        class="form-control @error('merek') is-invalid @enderror
                                        form-control-border"
                                        name="merek" id="merek">
                                        <option value="" selected disabled> ----- </option>
                                        <option value="1" @if (old('merek') == '1') selected required @endif>
                                            PAROTI </option>
                                        <option value="2" @if (old('merek') == '2') selected required @endif>
                                            ARNON </option>
                                        <option value="3" @if (old('merek') == '3') selected required @endif>
                                            JORDAN </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cabang" class="col-sm-2 col-form-label">Cabang</label>
                                <div class="col-sm-4">
                                    <span
                                        class="form-control @error('cabang') is-invalid @enderror
                                        form-control-border">{{ cabangs() }}</span>
                                    <input type="hidden" name="cabang" value="{{ Auth::user()->cabang }}">
                                    <input type="hidden" name="jenis" value="1">
                                    <input type="hidden" name="tgl"
                                        value="{{ date('Y') . '-' . date('m') . '-' . date('d') }}">
                                    <input type="hidden" name="bulan" value="{{ date('y') . date('m') }}">
                                    <input type="hidden" name="last_edit" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="col-sm-1">
                                </div>
                                <label for="produk" class="col-sm-1 col-form-label">Produk</label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-border" name="produk" id="produk">
                                        <option value="" selected disabled> ----- </option>
                                        <!-- PRODUK A -->
                                        @foreach ($paroti as $p)
                                            <option value="{{ '1_' . $p->id }}"
                                                @if (old('produk') == '1_' . $p->id) selected required @endif>
                                                {{ $p->produk }}
                                            </option>
                                        @endforeach
                                        @foreach ($arnon as $a)
                                            <option value="{{ '2_' . $a->id }}"
                                                @if (old('produk') == '3_' . $a->id) selected required @endif>
                                                {{ $a->produk }}
                                            </option>
                                        @endforeach
                                        @foreach ($jordan as $j)
                                            <option value="{{ '3_' . $j->id }}"
                                                @if (old('produk') == '3_' . $j->id) selected required @endif>
                                                {{ $j->produk }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="komunikasi" class="col-sm-2 col-form-label">Komunikasi Terkait</label>
                                <div class="col-sm-10">
                                    <select
                                        class="form-control @error('komunikasi') is-invalid @enderror
                                        form-control-border"
                                        name="komunikasi" id="komunikasi">
                                        <option value="" selected disabled> ----- </option>
                                        <option value="1" @if (old('komunikasi') == '1') selected @endif> 2022 -
                                            III - 001</option>
                                        <option value="2" @if (old('komunikasi') == '2') selected @endif> 2022 - XI
                                            - 001</option>
                                        <option value="3" @if (old('komunikasi') == '3') selected @endif> 2022 -
                                            XII - 002 </option>
                                    </select>
                                </div>
                            </div>

                            <h5 class="text-bold mt-5">Detail Informasi :</h5>
                            <input type="hidden" name="izinedar" id="izinedar" value="-">
                            <input type="hidden" name="mui" id="mui" value="-">
                            <div class="form-group row">
                                <label for="ukuran" class="col-sm-2 col-form-label">Detail Ukuran Baru</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('ukuran') is-invalid @enderror"
                                        name="ukuran" id="ukuran" value="{{ old('ukuran') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Lengkap</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4"
                                        cols="82" style="resize: none;">{{ old('deskripsi') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8">

                                </div>
                                <div class="col-sm-4 text-right">
                                    <u>Dibuat Oleh <b>{{ Auth::user()->nama_lengkap }}</b></u>
                                </div>
                            </div>
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
@endsection
