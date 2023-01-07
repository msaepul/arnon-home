@extends('main')

@section('judul')
@endsection

@section('isi')
    <title>App Central - Buat PTPP Eksternal</title>
    @php
        $jumlahakses = count(arrayakses());
        $cabang = cabang();
        $sdraft = 'draft' . $cabang;
        $bulan = date('F');
        $monthnow = date('m', time());
        $yearnow = date('Y', time());
        
        if ($kodeMax) {
            $nilaikode = substr($kodeMax, 0, 3);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $beda = (int) $nilaikode + 1;
            $kodeMaxp = str_pad($kode, 3, '0', STR_PAD_LEFT);
        } else {
            $kodeMaxp = '001';
        }
        $hasilkode = $kodeMaxp . '/' . tgl_id($monthnow) . '/' . $yearnow;
    @endphp
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

        {{ Breadcrumbs::render('add') }}
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Permintaan Tindakan Perbaikan dan Pencegahan</h3>
                    </div>
                    <form enctype="multipart/form-data" class="form-horizontal" style="zoom: 80%" method="POST"
                        action="{{ route('addptpp.action') }}">
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
                                <label for="nomor" class="col-sm-2 col-form-label">Nomor PTPP</label>
                                <div class="col-sm-3">
                                    <span
                                        class="form-control @error('nomor') is-invalid @enderror
                                        form-control-border">
                                        {{ $hasilkode }}
                                    </span>
                                    <input type="hidden" name="nomor" value="{{ $hasilkode }}">
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <label for="jenis" class="col-sm-2 col-form-label">Jenis PTPP</label>
                                <div class="col-sm-3">
                                    <span
                                        class="form-control @error('jenis') is-invalid @enderror
                                        form-control-border">Eksternal</span>
                                    <input type="hidden" name="jenis" value="eksternal">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tgl" class="col-sm-2 col-form-label">Tanggal PTPP</label>
                                <div class="col-sm-3">
                                    <span class="form-control form-control-border">
                                        {{ date('d') . '-' . date('F') . '-' . date('Y') }} </span>
                                    <input type="hidden" name="tgl"
                                        value="{{ date('Y') . '-' . date('m') . '-' . date('d') }}">
                                    <input type="hidden" name="bulan" value="{{ date('y') . date('m') }}">
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <label for="kategori" class="col-sm-2 col-form-label">Kategori PTPP</label>
                                <div class="col-sm-3">
                                    <select
                                        class="form-control @error('kategori') is-invalid @enderror
                                        form-control-border"
                                        name="kategori" id="kategori">
                                        <option disabled selected>...</option>
                                        @foreach ($dataKategori as $kat)
                                            <option value="{{ $kat->id }}"
                                                @if (old('kategori') == $kat->kategori) selected @endif>
                                                {{ $kat->kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dari" class="col-sm-2 col-form-label">Dari</label>
                                <div class="col-sm-3">
                                    <span class="form-control @error('dari') is-invalid @enderror form-control-border">
                                        {{ cabang() }}</span>
                                    <input type="hidden" name="dari" id="dari" value="{{ cabang() }}">
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <label for="d_dept" class="col-sm-2 col-form-label">Departemen</label>
                                <div class="col-sm-3">
                                    @if ($jumlahakses > 1)
                                        <select type="text"
                                            class="form-control @error('d_dept') is-invalid @enderror
                                    form-control-border"
                                            name="d_dept" id="d_dept">
                                            <option disabled selected>...</option>
                                            @foreach (arrayakses() as $a)
                                                <option value="{{ $a }}"
                                                    @if (old('d_dept') == $a) selected @endif>
                                                    {{ $a }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <span class="form-control form-control-border">
                                            {{ allakses() }} </span>
                                        <input type="hidden" name="d_dept" id="d_dept" value="{{ allakses() }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kepada" class="col-sm-2 col-form-label">Kepada</label>
                                <div class="col-sm-3">
                                    <select type="text"
                                        class="form-control @error('kepada') is-invalid @enderror
                                        form-control-border"
                                        name="kepada" id="kepada">
                                        <option disabled selected>...</option>
                                        @foreach ($dataCabang as $cabang)
                                            <option value="{{ $cabang->cabang }}"
                                                @if (old('kepada') == $cabang->cabang) selected @endif>
                                                {{ $cabang->cabang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <label for="d_dept" class="col-sm-2 col-form-label">Departemen</label>
                                <div class="col-sm-3">
                                    <select type="text"
                                        class="form-control @error('k_dept') is-invalid @enderror
                                        form-control-border"
                                        name="k_dept" id="k_dept">
                                        <option disabled selected>...</option>
                                        @foreach ($dataDept as $dept)
                                            <option value="{{ $dept->dept }}"
                                                @if (old('k_dept') == $dept->dept) selected @endif>
                                                {{ $dept->dept }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <h5 class="text-bold mt-5">Uraian Ketidaksesuaian :</h5>
                            <div class="form-group row">
                                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                        name="lokasi" id="lokasi" value="{{ old('lokasi') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="obyek" class="col-sm-2 col-form-label">Obyek</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('obyek') is-invalid @enderror"
                                        name="obyek" id="obyek" value="{{ old('obyek') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keadaan" class="col-sm-2 col-form-label">Keadaan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('keadaan') is-invalid @enderror" name="keadaan" rows="4" cols="82"
                                        style="resize: none;">{{ old('keadaan') }}</textarea>
                                </div>
                            </div>
                            <h6>(Dibuat Oleh: {{ Auth::user()->nama_lengkap }})</h6>
                            <input type="hidden" name="dibuat" value="{{ Auth::user()->nama_lengkap }}">
                            <input type="hidden" name="id_buat" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="randlink" value="{{ random_str(20) }}">


                            <h5 class="text-bold mt-4">Analisa Penyebab Ketidaksesuaian (gunakan metode 5 why) :</h5>


                            <h6 class="mt-4">(Dianalisa Oleh : ..... )</h6>


                            <h5 class="text-bold mt-4">Tindakan Perbaikan dan Pencegahan :</h5>


                            <h6 class="mt-4">(PIC : ..... )</h6>

                            <div class="form-group row mt-4">
                                <label for="target_selesai" class="col-sm-2 col-form-label">Target Selesai</label>
                                <div class="col-sm-3">
                                    <span class="form-control @error('target') is-invalid @enderror form-control-border">
                                        ..... </span>
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
                        <div class="dz-message mt-2">
                            <em class="ml-4">Catatan : </em><br>
                            <em class="ml-4">1. Ukuran maksimal setiap file = 2Mb (Total 10Mb)</em><br>
                            <em class="ml-4">2. Maksimal File yang dipilih = 5 file </em><br>
                            <em class="ml-4">3. Jenis file yang diperbolehkan : </em><br>
                            <em class="ml-5">a. Gambar (jpg, png, jpeg), </em><br>
                            <em class="ml-5">b. Video (3Gp, Mp4, Mkv), </em><br>
                            <em class="ml-5">c. Document (PDF). </em><br>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="lampiran1" class="col-sm-2 col-form-label">Lampiran 1</label>
                            <div class="custom-file col-sm-10">
                                <input type="file" class="custom-file-input" id="lampiran1" name="lampiran1"
                                    accept="image/*,video/*,.pdf">
                                <label class="custom-file-label" for="lampiran1">Upload Lampiran Ke-1</label>
                                @error('lampiran1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lampiran2" class="col-sm-2 col-form-label">Lampiran 2</label>
                            <div class="custom-file col-sm-10">
                                <input type="file" class="custom-file-input" id="lampiran2" name="lampiran2"
                                    accept="image/*,video/*,.pdf">
                                <label class="custom-file-label" for="lampiran2">Upload Lampiran Ke-2</label>
                                @error('lampiran2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lampiran3" class="col-sm-2 col-form-label">Lampiran 3</label>
                            <div class="custom-file col-sm-10">
                                <input type="file" class="custom-file-input" id="lampiran3" name="lampiran3"
                                    accept="image/*,video/*,.pdf">
                                <label class="custom-file-label" for="lampiran3">Upload Lampiran Ke-3</label>
                                @error('lampiran3')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lampiran4" class="col-sm-2 col-form-label">Lampiran 4</label>
                            <div class="custom-file col-sm-10">
                                <input type="file" class="custom-file-input" id="lampiran4" name="lampiran4"
                                    accept="image/*,video/*,.pdf">
                                <label class="custom-file-label" for="lampiran4">Upload Lampiran Ke-4</label>
                                @error('lampiran4')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lampiran5" class="col-sm-2 col-form-label">Lampiran 5</label>
                            <div class="custom-file col-sm-10">
                                <input type="file" class="custom-file-input" id="lampiran5" name="lampiran5"
                                    accept="image/*,video/*,.pdf">
                                <label class="custom-file-label" for="lampiran5">Upload Lampiran Ke-5</label>
                                @error('lampiran5')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
