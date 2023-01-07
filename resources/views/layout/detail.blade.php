@extends('main')

@section('judul')
@endsection

@section('isi')
    <title>App Central - Detail PTPP</title>
    @php
        $cabang = cabang();
        $dept = Auth::user()->dept;
        $iduser = Auth::user()->id;
        if ($jenis == 'internal') {
            $split = explode('/', substr($nomor, 4, 12));
        } else {
            $split = explode('/', $nomor);
        }
        $spltlam1 = explode('.', strtolower($lampiran1));
        $spltlam2 = explode('.', strtolower($lampiran2));
        $spltlam3 = explode('.', strtolower($lampiran3));
        $spltlam4 = explode('.', strtolower($lampiran4));
        $spltlam5 = explode('.', strtolower($lampiran5));
        $before = $_GET['b'];
    @endphp
    <section class="content-header" style="margin-top: -3%;">
        {{ Breadcrumbs::render('detail', $utama) }}
    </section>
    @if (session('success'))
        <div class="alert alert-success alert dismissible fade show" role="alert" id="success-alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            @if ($status == 'draft' &&
                (($kepada == $cabang && ($k_dept == $dept || $k_dept == 'SIS' || $k_dept == 'BM')) ||
                    ($kepada == 'HO' && $k_dept == 'SIS' && $jenis == 'eksternal')))
                <a href="{{ url("layout/detail/edit/$kode?b=$before") }}">
                    <button type="button" class="btn btn-light">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span>Edit</span>
                    </button>
                </a>
                <a href="{{ url('/confirm/' . $kode) }}" onclick="return confirm('Yakin Akan Mengkonfirmasi PTPP ?')">
                    <button type="button" class="btn btn-danger">
                        <i class="fa-solid fa-check-to-slot"></i>
                        <span>Confirm</span>
                    </button>
                </a>
            @elseif ($status == 'draft' &&
                (($kepada == $cabang && ($dept == 'SIS' || $dept == 'BM')) ||
                    ($cabang == 'HO' && $dept == 'SIS' && $jenis == 'eksternal')))
                <a href="{{ url("layout/detail/revisi/$kode?b=$before") }}">
                    <button type="button" class="btn btn-light">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span>Revisi</span>
                    </button>
                </a>
                <a href="{{ url('/confirm/' . $kode) }}" onclick="return confirm('Yakin Akan Mengkonfirmasi PTPP ?')">
                    <button type="button" class="btn btn-danger">
                        <i class="fa-solid fa-check-to-slot"></i>
                        <span>Confirm</span>
                    </button>
                </a>
            @elseif ($status == 'confirm' &&
                $jenis == 'eksternal' &&
                (($dari == $cabang && ($d_dept == $dept || $dept == 'SIS' || $dept == 'BM')) ||
                    ($cabang == 'HO' && $dept == 'SIS')))
                <a href="{{ url('/terima/' . $kode) }}"
                    onclick="return terima('Yakin Akan Menerima Analisa dan Tindakan Perbaikan ?')">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-check-circle"></i>
                        <span>Terima</span>
                    </button>
                </a>
                <a data-toggle="modal" data-target="#tolakModal"
                    onclick="return confirm('Yakin Akan Menolak Analisa PTPP?')">
                    <button type="button" class="btn btn-danger waves-effect" data-type="cancel">
                        <i class="fa-solid fa-times"></i>
                        <span>Tolak</span>
                    </button>
                </a>
            @elseif ($status == 'confirm' && ($dari == $cabang && ($dept == 'SIS' || $dept == 'BM')))
                <a href="{{ url('/confbm/' . $kode) }}"
                    onclick="return terima2('Yakin Akan Menerima Analisa dan Tindakan Perbaikan ?')">
                    <button type="button" class="btn btn-success">
                        <i class="fas fa-check-circle"></i>
                        <span>Confirm BM</span>
                    </button>
                </a>
                <a data-toggle="modal" data-target="#tolakModal"
                    onclick="return confirm('Yakin Akan Menolak Analisa PTPP?')">
                    <button type="button" class="btn btn-danger waves-effect" data-type="cancel">
                        <i class="fa-solid fa-times"></i>
                        <span>Tolak</span>
                    </button>
                </a>
            @elseif ($status == 'confbm' && ($dari == $cabang && ($d_dept == $dept || $dept == 'SIS' || $dept == 'BM')))
                <a href="{{ url('/terima/' . $kode) }}"
                    onclick="return unclose('PTPP akan berstatus Unclose, Yakin akan Menerima PTPP?')">
                    <button type="button" class="btn btn-danger">
                        <i class="fa-solid fa-check-to-slot"></i>
                        <span>Terima</span>
                    </button>
                </a>
                <a data-toggle="modal" data-target="#tolakModal"
                    onclick="return confirm('Yakin Akan Menolak Analisa PTPP?')">
                    <button type="button" class="btn btn-danger waves-effect" data-type="cancel">
                        <i class="fa-solid fa-times"></i>
                        <span>Tolak</span>
                    </button>
                </a>
            @elseif ($status == 'ditolak' &&
                (($kepada == $cabang && ($k_dept == $dept || $dept == 'SIS' || $dept == 'BM')) ||
                    ($cabang == 'HO' && $dept == 'SIS' && $jenis == 'eksternal')))
                <a href="{{ url("layout/detail/edit/$kode?b=$before") }}">
                    <button type="button" class="btn btn-light">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span>Edit</span>
                    </button>
                </a>
                <a href="{{ url('/confirm/' . $kode) }}" onclick="return confirm('Yakin Akan Mengkonfirmasi PTPP ?')">
                    <button type="button" class="btn btn-danger">
                        <i class="fa-solid fa-check-to-slot"></i>
                        <span>Confirm</span>
                    </button>
                </a>
            @elseif ($status == 'unclose' &&
                (($dari == $cabang && ($d_dept == $dept || $dept == 'SIS' || $dept == 'BM')) ||
                    ($cabang == 'HO' && $dept == 'SIS' && $jenis == 'eksternal')))
                <a href="{{ url('/close/' . $kode) }}" onclick="return confirm('Yakin Akan Menyelsaikan PTPP ?')">
                    <button type="button" class="btn btn-danger">
                        <i class="fa-solid fa-check-to-slot"></i>
                        <span>Close</span>
                    </button>
                </a>
            @else
                <button type="button" class="btn btn-light disabled">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Edit</span>
                </button>
            @endif
            @if ($status == 'draft' &&
                (($dari == $cabang && ($dept == 'SIS' || $dept == 'BM')) ||
                    ($cabang == 'HO' && $dept == 'SIS' && $jenis == 'eksternal')))
                <a data-toggle="modal" data-target="#cancelModal" onclick="return confirm('Yakin Akan Membatalkan PTPP?')">
                    <button type="button" class="btn btn-danger waves-effect" data-type="cancel">
                        <i class="fa-solid fa-times"></i>
                        <span>Cancel</span>
                    </button>
                </a>
            @endif
            <span style="float: right;">
                @if ($status == 'cancel')
                    <label class="wtf wtf-danger wtf-arrow-right selected">
                        CANCEL
                    </label>
                @elseif ($status == 'ditolak')
                    <label class="wtf wtf-danger wtf-arrow-right selected">
                        DITOLAK
                    </label>
                @else
                    <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'draft') selected @endif">
                        DRAFT
                    </label>

                    <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'confirm') selected @endif">
                        CONFIRM
                    </label>

                    @if ($jenis == 'internal')
                        <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'confbm') selected @endif">
                            ACC BM
                        </label>
                    @endif

                    @if ($status == 'close')
                        <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'close') selected @endif">
                            CLOSE
                        </label>
                    @else
                        <label class="wtf wtf-danger wtf-arrow-right @if ($status == 'unclose') selected @endif">
                            UNCLOSE
                        </label>
                    @endif
                @endif
            </span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Permintaan Tindakan Perbaikan dan Pencegahan</h3>
                    </div>
                    <div class="card-body" style="zoom: 80%">
                        @if ($status == 'cancel' || $status == 'ditolak')
                            <div class="form-group row">
                                <div class="col-sm-5">
                                </div>
                                <label for="alasan" class="col-sm-6 col-form-label" style="color: red">Alasan PTPP
                                    {{ $status }}</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea class="form-control form-control-border" name="alasan" style="resize: none;" readonly>{{ $alasan }}</textarea>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="nomor" class="col-sm-2 col-form-label">Nomor PTPP</label>
                            <div class="col-sm-3">
                                <span class="form-control form-control-border">
                                    {{ $nomor }}
                                </span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="jenis" class="col-sm-2 col-form-label">Jenis PTPP</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">{{ strtoupper($jenis) }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl" class="col-sm-2 col-form-label">Tanggal PTPP</label>
                            <div class="col-sm-3">
                                <span class="form-control form-control-border">{{ tgl($tgl) }}</span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori PTPP</label>
                            <div class="col-sm-4">
                                <span class="form-control form-control-border">
                                    {{ kategori($kategori) }}
                                </span>
                            </div>
                            @if ($jenis == 'internal' && $subkategori != null)
                                <div class="col-sm-5">
                                </div>
                                <label for="kategori" class="col-sm-3 col-form-label text-right">Sub Kategori PTPP</label>
                                <div class="col-sm-4">
                                    <span class="form-control form-control-border">
                                        {{ kategori($subkategori) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="dari" class="col-sm-2 col-form-label">Dari</label>
                            <div class="col-sm-3">
                                <span class="form-control form-control-border">
                                    {{ $dari }}</span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="d_dept" class="col-sm-2 col-form-label">Departemen</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">
                                    {{ $d_dept }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kepada" class="col-sm-2 col-form-label">Kepada</label>
                            <div class="col-sm-3">
                                <span class="form-control form-control-border">
                                    {{ $kepada }}</span>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <label for="k_dept" class="col-sm-2 col-form-label">Departemen</label>
                            <div class="col-sm-2">
                                <span class="form-control form-control-border">
                                    {{ $k_dept }}</span>
                            </div>
                        </div>

                        <h5 class="text-bold mt-5">Uraian Ketidaksesuaian :</h5>
                        <div class="form-group row">
                            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                <span class="form-control form-control-border">
                                    {{ $lokasi }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="obyek" class="col-sm-2 col-form-label">Obyek</label>
                            <div class="col-sm-10">
                                <span class="form-control form-control-border">
                                    {{ $obyek }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keadaan" class="col-sm-2 col-form-label">Keadaan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="keadaan" rows="4" cols="82" style="resize: none;" readonly>{{ $keadaan }}</textarea>
                            </div>
                        </div>
                        <h6>(Dibuat Oleh: {{ $dibuat }})</h6>


                        <h5 class="text-bold mt-4">Analisa Penyebab Ketidaksesuaian (gunakan metode 5 why) :</h5>
                        <div class="form-group row">
                            <label for="analisa1" class="col-sm-1 col-form-label">
                                <i class="fas fa-dot-circle" style="float: right"></i>
                            </label>
                            <div class="col-sm-11">
                                @if ($analisa1 == null)
                                    ________________
                                @else
                                    {{ $analisa1 }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="analisa1" class="col-sm-1 col-form-label">
                                <i class="fas fa-dot-circle" style="float: right"></i>
                            </label>
                            <div class="col-sm-11">
                                @if ($analisa2 == null)
                                    ________________
                                @else
                                    {{ $analisa2 }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="analisa1" class="col-sm-1 col-form-label">
                                <i class="fas fa-dot-circle" style="float: right"></i>
                            </label>
                            <div class="col-sm-11">
                                @if ($analisa3 == null)
                                    ________________
                                @else
                                    {{ $analisa3 }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="analisa1" class="col-sm-1 col-form-label">
                                <i class="fas fa-dot-circle" style="float: right"></i>
                            </label>
                            <div class="col-sm-11">
                                @if ($analisa4 == null)
                                    ________________
                                @else
                                    {{ $analisa4 }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="analisa1" class="col-sm-1 col-form-label">
                                <i class="fas fa-dot-circle" style="float: right"></i>
                            </label>
                            <div class="col-sm-11">
                                @if ($analisa5 == null)
                                    ________________
                                @else
                                    {{ $analisa5 }}
                                @endif
                            </div>
                        </div>


                        <h6 class="mt-4">
                            @if ($dianalisa == null)
                                (Dianalisa Oleh : ..... )
                            @else
                                (Dianalisa Oleh : {{ $dianalisa }} / {{ tgl($tgl_analisa) }})
                            @endif
                        </h6>


                        <h5 class="text-bold mt-4">Tindakan Perbaikan dan Pencegahan :</h5>
                        <div class="form-group row">
                            <label for="tindakan1" class="col-sm-1 col-form-label">
                                <i class="fas fa-dot-circle" style="float: right"></i>
                            </label>
                            <div class="col-sm-11">
                                @if ($tindakan1 == null)
                                    ________________
                                @else
                                    {{ $tindakan1 }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tindakan2" class="col-sm-1 col-form-label">
                                <i class="fas fa-dot-circle" style="float: right"></i>
                            </label>
                            <div class="col-sm-11">
                                @if ($tindakan2 == null)
                                    ________________
                                @else
                                    {{ $tindakan2 }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tindakan3" class="col-sm-1 col-form-label">
                                <i class="fas fa-dot-circle" style="float: right"></i>
                            </label>
                            <div class="col-sm-11">
                                @if ($tindakan3 == null)
                                    ________________
                                @else
                                    {{ $tindakan3 }}
                                @endif
                            </div>
                        </div>


                        <h6 class="mt-4">
                            @if ($pic == null)
                                (PIC : ..... )
                            @else
                                (PIC : {{ $pic }} )
                            @endif
                        </h6>

                        <div class="form-group row mt-4">
                            <label for="target_selesai" class="col-sm-2 col-form-label">Target Selesai</label>
                            <div class="col-sm-3">
                                <span class="form-control form-control-border">
                                    @if ($target_selesai == null)
                                        ( ..... )
                                    @else
                                        {{ tgl($target_selesai) }}
                                    @endif
                                </span>
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
                                @else
                                    @for ($i = 1; $i < 6; $i++)
                                        <?php
                                        $lampiran = 'lampiran' . $i;
                                        $spltlam = 'spltlam' . $i;
                                        ?>
                                        <div class="item col-sm-4 col-md-4 mb-4">
                                            @if ($$lampiran == '' || $$lampiran == null || $$lampiran == '-')
                                            @elseif ($$spltlam[2] == 'jpg' ||
                                                $$spltlam[2] == 'tiff' ||
                                                $$spltlam[2] == 'jfif' ||
                                                $$spltlam[2] == 'bmp' ||
                                                $$spltlam[2] == 'gif' ||
                                                $$spltlam[2] == 'svg' ||
                                                $$spltlam[2] == 'png' ||
                                                $$spltlam[2] == 'jpeg' ||
                                                $$spltlam[2] == 'jpg' ||
                                                $$spltlam[2] == 'webp' ||
                                                $$spltlam[2] == 'tif')
                                                <a href="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $$lampiran) }}"
                                                    class="fancybox" data-fancybox="gallery1"
                                                    data-caption="Lampiran {{ $i }}">
                                                    <img src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $$lampiran) }}"
                                                        width="100%" height="100%">
                                                </a>
                                            @elseif ($$spltlam[2] == 'mp4' || $$spltlam[2] == '3gp' || $$spltlam[2] == 'mkv')
                                                <video class="img-responsive thumbnail" style="width: 100%; height: 15em;"
                                                    controls>
                                                    <source
                                                        src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $$lampiran) }}"
                                                        type="video/mp4">
                                                </video>
                                            @elseif ($$spltlam[2] == 'pdf')
                                                <embed type="application/pdf"
                                                    src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $$lampiran) }}"
                                                    view="FitH" width="100%" height="100%">
                                            @endif
                                        </div>
                                    @endfor
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="cancelModalLabel">Alasan PTPP Dibatalkan : </h4>
                    </div>
                    <form method="post" id="insert_form" action="{{ route('layout.cancelstat', $kode) }}">
                        @csrf
                        <div class="modal-body">
                            <textarea class="form-control" name="alasan" id="alasan" style="width: 100%; height: 134px; resize: none;"
                                minlength="15" maxlength="755" placeholde="Berikan Alasan Pembatalan PTPP" required></textarea>
                            <div class="modal-footer">
                                <input type="submit" name="insert" id="insert" value="SAVE"
                                    class="btn btn-link waves-effect" />
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal"
                                    style="opacity: 0.6; color: gray;">CLOSE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tolakModalLabel">Alasan Analisa PTPP ditolak : </h4>
                    </div>
                    <form method="post" id="insert_form" action="{{ route('layout.tolakstat', $kode) }}">
                        @csrf
                        <div class="modal-body">
                            <textarea class="form-control" name="alasan" id="alasan" style="width: 100%; height: 134px; resize: none;"
                                minlength="15" maxlength="755" placeholde="Berikan Alasan Pembatalan PTPP" required></textarea>
                            <div class="modal-footer">
                                <input type="submit" name="insert" id="insert" value="SAVE"
                                    class="btn btn-link waves-effect" />
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal"
                                    style="opacity: 0.6; color: gray;">CLOSE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
