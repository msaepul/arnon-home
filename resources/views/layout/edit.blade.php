@extends('main')

@section('judul')
@endsection

@section('isi')
    <title>App Central - Edit PTPP</title>
    <?php
    $cabang = cabang();
    $sdraft = 'draft' . $cabang;
    $bulan = date('F');
    $monthnow = date('m', time());
    $yearnow = date('Y', time());
    $split = explode('/', $nomor);
    $spltlam1 = explode('.', $lampiran1);
    $spltlam2 = explode('.', $lampiran2);
    $spltlam3 = explode('.', $lampiran3);
    $spltlam4 = explode('.', $lampiran4);
    $spltlam5 = explode('.', $lampiran5);
    $before = $_GET['b'];
    ?>
    <section class="content-header" style="margin-top: -3%; margin-bottom: -1%;">
        {{-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit PTPP {{ $nomor }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/layout/home' }}">Home</a></li>
                        <li class="breadcrumb-item active">Buat PTPP</li>
                    </ol>
                </div>
            </div>
        </div> --}}

        {{ Breadcrumbs::render('detail', $ubah) }}

    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Permintaan Tindakan Perbaikan dan Pencegahan</h3>
                    </div>
                    <form enctype="multipart/form-data" class="form-horizontal" style="zoom: 80%" method="POST"
                        action="{{ route('editptpp.action') }}">
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
                            <div class="card card-dark collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Detail PTPP</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nomor" class="col-sm-2 col-form-label">Nomor PTPP</label>
                                        <div class="col-sm-3">
                                            <span
                                                class="form-control @error('nomor') is-invalid @enderror
                                        form-control-border">
                                                {{ $nomor }}
                                            </span>
                                            <input type="hidden" name="kode" value="{{ $kode }}">
                                        </div>
                                        <div class="col-sm-2">
                                        </div>
                                        <label for="jenis" class="col-sm-2 col-form-label">Jenis PTPP</label>
                                        <div class="col-sm-3">
                                            <span
                                                class="form-control @error('jenis') is-invalid @enderror
                                        form-control-border">{{ strtoupper($jenis) }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tgl" class="col-sm-2 col-form-label">Tanggal PTPP</label>
                                        <div class="col-sm-3">
                                            <span class="form-control form-control-border">
                                                {{ $tgl }} </span>
                                        </div>
                                        <div class="col-sm-2">
                                        </div>
                                        <label for="kategori" class="col-sm-2 col-form-label">Kategori PTPP</label>
                                        <div class="col-sm-3">
                                            <span
                                                class="form-control @error('kategori') is-invalid @enderror form-control-border">
                                                {{ $kategori }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dari" class="col-sm-2 col-form-label">Dari</label>
                                        <div class="col-sm-3">
                                            <span
                                                class="form-control @error('dari') is-invalid @enderror form-control-border">
                                                {{ $dari }}</span>
                                        </div>
                                        <div class="col-sm-2">
                                        </div>
                                        <label for="d_dept" class="col-sm-2 col-form-label">Departemen</label>
                                        <div class="col-sm-3">
                                            <span
                                                class="form-control @error('d_dept') is-invalid @enderror form-control-border">
                                                {{ $d_dept }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kepada" class="col-sm-2 col-form-label">Kepada</label>
                                        <div class="col-sm-3">
                                            <span
                                                class="form-control @error('kepada') is-invalid @enderror form-control-border">
                                                {{ $kepada }}</span>
                                        </div>
                                        <div class="col-sm-2">
                                        </div>
                                        <label for="d_dept" class="col-sm-2 col-form-label">Departemen</label>
                                        <div class="col-sm-3">
                                            <span
                                                class="form-control @error('k_dept') is-invalid @enderror form-control-border">
                                                {{ $k_dept }}</span>
                                        </div>
                                    </div>

                                    <h5 class="text-bold mt-5">Uraian Ketidaksesuaian :</h5>
                                    <div class="form-group row">
                                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                                        <div class="col-sm-10">
                                            <span
                                                class="form-control @error('lokasi') is-invalid @enderror form-control-border">
                                                {{ $lokasi }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="obyek" class="col-sm-2 col-form-label">Obyek</label>
                                        <div class="col-sm-10">
                                            <span
                                                class="form-control @error('obyek') is-invalid @enderror form-control-border">
                                                {{ $obyek }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="keadaan" class="col-sm-2 col-form-label">Keadaan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control @error('keadaan') is-invalid @enderror" name="keadaan" rows="4" cols="82"
                                                style="resize: none;" readonly>{{ $keadaan }}</textarea>
                                        </div>
                                    </div>
                                    <h6>(Dibuat Oleh: {{ $dibuat }})</h6>
                                </div>
                            </div>

                            <h5 class="text-bold mt-4">Analisa Penyebab Ketidaksesuaian (gunakan metode 5 why) :</h5>
                            <div class="form-group row">
                                <label for="analisa1" class="col-sm-1 col-form-label">
                                    <i class="fas fa-dot-circle mt-3" style="float: right"></i>
                                </label>
                                <div class="col-sm-11">
                                    <textarea class="form-control @error('analisa1') is-invalid @enderror" name="analisa1" rows="2"
                                        cols="82" style="resize: none;">{{ $analisa1 }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="analisa2" class="col-sm-1 col-form-label">
                                    <i class="fas fa-dot-circle mt-3" style="float: right"></i>
                                </label>
                                <div class="col-sm-11">
                                    <textarea class="form-control @error('analisa2') is-invalid @enderror" name="analisa2" rows="2"
                                        cols="82" style="resize: none;">{{ $analisa2 }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="analisa3" class="col-sm-1 col-form-label">
                                    <i class="fas fa-dot-circle mt-3" style="float: right"></i>
                                </label>
                                <div class="col-sm-11">
                                    <textarea class="form-control @error('analisa3') is-invalid @enderror" name="analisa3" rows="2"
                                        cols="82" style="resize: none;">{{ $analisa3 }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="analisa4" class="col-sm-1 col-form-label">
                                    <i class="fas fa-dot-circle mt-3" style="float: right"></i>
                                </label>
                                <div class="col-sm-11">
                                    <textarea class="form-control @error('analisa4') is-invalid @enderror" name="analisa4" rows="2"
                                        cols="82" style="resize: none;">{{ $analisa4 }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="analisa5" class="col-sm-1 col-form-label">
                                    <i class="fas fa-dot-circle mt-3" style="float: right"></i>
                                </label>
                                <div class="col-sm-11">
                                    <textarea class="form-control @error('analisa5') is-invalid @enderror" name="analisa5" rows="2"
                                        cols="82" style="resize: none;">{{ $analisa5 }}</textarea>
                                </div>
                            </div>


                            <h6 class="mt-4">(Dianalisa Oleh : @if ($dianalisa == null)
                                    {{ Auth::user()->nama_lengkap }}
                                @else
                                    {{ $dianalisa }}
                                @endif )</h6>
                            <input type="hidden" name="dianalisa" value="{{ Auth::user()->nama_lengkap }}">
                            <input type="hidden" name="tgl_analisa" value="{{ date('Y-m-d') }}">


                            <h5 class="text-bold mt-4">Tindakan Perbaikan dan Pencegahan :</h5>
                            <div class="form-group row">
                                <label for="tindakan1" class="col-sm-1 col-form-label">
                                    <i class="fas fa-dot-circle mt-3" style="float: right"></i>
                                </label>
                                <div class="col-sm-11">
                                    <textarea class="form-control @error('tindakan1') is-invalid @enderror" name="tindakan1" rows="2"
                                        cols="82" style="resize: none;">{{ $tindakan1 }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tindakan2" class="col-sm-1 col-form-label">
                                    <i class="fas fa-dot-circle mt-3" style="float: right"></i>
                                </label>
                                <div class="col-sm-11">
                                    <textarea class="form-control @error('tindakan2') is-invalid @enderror" name="tindakan2" rows="2"
                                        cols="82" style="resize: none;">{{ $tindakan2 }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tindakan3" class="col-sm-1 col-form-label">
                                    <i class="fas fa-dot-circle mt-3" style="float: right"></i>
                                </label>
                                <div class="col-sm-11">
                                    <textarea class="form-control @error('tindakan3') is-invalid @enderror" name="tindakan3" rows="2"
                                        cols="82" style="resize: none;">{{ $tindakan3 }}</textarea>
                                </div>
                            </div>



                            <div class="form-group row mt-4">
                                <label for="pic" class="col-sm-1 col-form-label">PIC</label>
                                <div class="col-sm-4">
                                    <select type="text"
                                        class="form-control @error('pic') is-invalid @enderror
                                        form-control-border"
                                        name="pic" id="pic">
                                        <option disabled selected>...</option>
                                        @foreach ($dataUser as $user)
                                            <option value="{{ $user->nama_lengkap }}"
                                                @if ($pic == $user->nama_lengkap) selected @endif>
                                                {{ $user->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="target_selesai" class="col-sm-2 col-form-label">Target Selesai</label>
                                <div class="col-sm-3">
                                    <input type="date" name="target_selesai" value="{{ $target_selesai }}"
                                        class="form-control @error('target_selesai') is-invalid @enderror form-control-border">
                                </div>
                            </div>
                        </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Lampiran</h3>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                @if ($lampiran1 == '' || $lampiran1 == null || $lampiran1 == '-')
                                    <div class="item col-sm-4 col-md-4 mb-4">
                                    </div>
                                    <div class="item col-sm-6 col-md-6 mb-6">
                                        <h5> <b>TIDAK ADA LAMPIRAN</b></h5>
                                    </div>
                                @endif
                                @for ($i = 1; $i < 6; $i++)
                                    <?php
                                    $lampiran = 'lampiran' . $i;
                                    $spltlam = 'spltlam' . $i;
                                    ?>
                                    <div class="item col-sm-6 col-md-6 mb-6">
                                        @if ($$lampiran == '' || $$lampiran == null || $$lampiran == '-')
                                        @elseif ($$spltlam[1] == 'jpg' ||
                                            $$spltlam[1] == 'tiff' ||
                                            $$spltlam[1] == 'jfif' ||
                                            $$spltlam[1] == 'bmp' ||
                                            $$spltlam[1] == 'gif' ||
                                            $$spltlam[1] == 'svg' ||
                                            $$spltlam[1] == 'png' ||
                                            $$spltlam[1] == 'jpeg' ||
                                            $$spltlam[1] == 'jpg' ||
                                            $$spltlam[1] == 'webp' ||
                                            $$spltlam[1] == 'tif')
                                            <a href="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $$lampiran) }}"
                                                class="fancybox" data-fancybox="gallery1">
                                                <img src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $$lampiran) }}"
                                                    width="100%" height="100%">
                                            </a>
                                        @elseif ($$spltlam[1] == 'mp4' || $$spltlam[1] == '3gp' || $$spltlam[1] == 'mkv')
                                            <video class="img-responsive thumbnail" style="width: 100%; height: 15em;"
                                                controls>
                                                <source
                                                    src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $$lampiran) }}"
                                                    type="video/mp4">
                                            </video>
                                        @elseif ($$spltlam[1] == 'pdf')
                                            <embed type="application/pdf"
                                                src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $$lampiran) }}"
                                                view="FitH" width="100%" height="100%">
                                        @endif
                                    </div>
                                @endfor
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
@endsection
