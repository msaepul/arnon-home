@extends('main')

@section('judul')
@endsection

@section('isi')
    <title>App Central - Galeri Foto</title>
    <section class="content-header" style="margin-top: -3%;">
        {{ Breadcrumbs::render('foto') }}
    </section>
    @if (session('success'))
        <div class="alert alert-success alert dismissible fade show" role="alert" id="success-alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Lampiran</h3>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">

                        @foreach ($dataUtama as $d)
                            @php
                                $cabang = cabang();
                                $kode = $d->kode;
                                $dept = Auth::user()->dept;
                                $iduser = Auth::user()->id;
                                if ($d->jenis == 'internal') {
                                    $split = explode('/', substr($d->nomor, 4, 12));
                                } else {
                                    $split = explode('/', $d->nomor);
                                }
                                $spltlam1 = explode('.', strtolower($d->lampiran1));
                                $spltlam2 = explode('.', strtolower($d->lampiran2));
                                $spltlam3 = explode('.', strtolower($d->lampiran3));
                                $spltlam4 = explode('.', strtolower($d->lampiran4));
                                $spltlam5 = explode('.', strtolower($d->lampiran5));
                                $lampiran1 = $d->lampiran1;
                                $lampiran2 = $d->lampiran2;
                                $lampiran3 = $d->lampiran3;
                                $lampiran4 = $d->lampiran4;
                                $lampiran5 = $d->lampiran5;
                            @endphp

                            {{-- LAMPIRAN 1 --}}
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran1) &&
                                ($spltlam1[2] == 'jpg' ||
                                    $spltlam1[2] == 'tiff' ||
                                    $spltlam1[2] == 'jfif' ||
                                    $spltlam1[2] == 'bmp' ||
                                    $spltlam1[2] == 'gif' ||
                                    $spltlam1[2] == 'svg' ||
                                    $spltlam1[2] == 'png' ||
                                    $spltlam1[2] == 'jpeg' ||
                                    $spltlam1[2] == 'jpg' ||
                                    $spltlam1[2] == 'webp' ||
                                    $spltlam1[2] == 'tif'))
                                <div class="item col-sm-3 col-md-3 mb-3">
                                    <a href="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran1) }}"
                                        class="fancybox" data-fancybox="gallery1"
                                        data-caption="Lampiran 1 <br> PTPP No {{ $d->nomor }} <b>({{ strtoupper($d->status) }})</b> <br> Dari : {{ $d->d_dept . ' ' . $d->dari }} <br> Kepada : {{ $d->k_dept . ' ' . $d->d_dept }}<br> Lokasi : {{ $d->lokasi }} <br> Obyek : {{ $d->obyek }}">
                                        <img src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran1) }}"
                                            width="100%" height="300em">
                                    </a>
                                </div>
                            @endif

                            {{-- LAMPIRAN 2 --}}
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran2) &&
                                ($spltlam2[2] == 'jpg' ||
                                    $spltlam2[2] == 'tiff' ||
                                    $spltlam2[2] == 'jfif' ||
                                    $spltlam2[2] == 'bmp' ||
                                    $spltlam2[2] == 'gif' ||
                                    $spltlam2[2] == 'svg' ||
                                    $spltlam2[2] == 'png' ||
                                    $spltlam2[2] == 'jpeg' ||
                                    $spltlam2[2] == 'jpg' ||
                                    $spltlam2[2] == 'webp' ||
                                    $spltlam2[2] == 'tif'))
                                <div class="item col-sm-3 col-md-3 mb-3">
                                    <a href="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran2) }}"
                                        class="fancybox" data-fancybox="gallery1"
                                        data-caption="Lampiran 2 <br> PTPP No {{ $d->nomor }} <b>({{ strtoupper($d->status) }})</b> <br> Dari : {{ $d->d_dept . ' ' . $d->dari }} <br> Kepada : {{ $d->k_dept . ' ' . $d->d_dept }}<br> Lokasi : {{ $d->lokasi }} <br> Obyek : {{ $d->obyek }}">
                                        <img src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran2) }}"
                                            width="100%" height="300em">
                                    </a>
                                </div>
                            @endif

                            {{-- LAMPIRAN 3 --}}
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran3) &&
                                ($spltlam3[2] == 'jpg' ||
                                    $spltlam3[2] == 'tiff' ||
                                    $spltlam3[2] == 'jfif' ||
                                    $spltlam3[2] == 'bmp' ||
                                    $spltlam3[2] == 'gif' ||
                                    $spltlam3[2] == 'svg' ||
                                    $spltlam3[2] == 'png' ||
                                    $spltlam3[2] == 'jpeg' ||
                                    $spltlam3[2] == 'jpg' ||
                                    $spltlam3[2] == 'webp' ||
                                    $spltlam3[2] == 'tif'))
                                <div class="item col-sm-3 col-md-3 mb-3">
                                    <a href="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran3) }}"
                                        class="fancybox" data-fancybox="gallery1"
                                        data-caption="Lampiran 3 <br> PTPP No {{ $d->nomor }} <b>({{ strtoupper($d->status) }})</b> <br> Dari : {{ $d->d_dept . ' ' . $d->dari }} <br> Kepada : {{ $d->k_dept . ' ' . $d->d_dept }}<br> Lokasi : {{ $d->lokasi }} <br> Obyek : {{ $d->obyek }}">
                                        <img src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran3) }}"
                                            width="100%" height="300em">
                                    </a>
                                </div>
                            @endif

                            {{-- LAMPIRAN 4 --}}
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran4) &&
                                ($spltlam4[2] == 'jpg' ||
                                    $spltlam4[2] == 'tiff' ||
                                    $spltlam4[2] == 'jfif' ||
                                    $spltlam4[2] == 'bmp' ||
                                    $spltlam4[2] == 'gif' ||
                                    $spltlam4[2] == 'svg' ||
                                    $spltlam4[2] == 'png' ||
                                    $spltlam4[2] == 'jpeg' ||
                                    $spltlam4[2] == 'jpg' ||
                                    $spltlam4[2] == 'webp' ||
                                    $spltlam4[2] == 'tif'))
                                <div class="item col-sm-3 col-md-3 mb-3">
                                    <a href="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran4) }}"
                                        class="fancybox" data-fancybox="gallery1"
                                        data-caption="Lampiran 4 <br> PTPP No {{ $d->nomor }} <b>({{ strtoupper($d->status) }})</b> <br> Dari : {{ $d->d_dept . ' ' . $d->dari }} <br> Kepada : {{ $d->k_dept . ' ' . $d->d_dept }}<br> Lokasi : {{ $d->lokasi }} <br> Obyek : {{ $d->obyek }}">
                                        <img src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran4) }}"
                                            width="100%" height="300em">
                                    </a>
                                </div>
                            @endif

                            {{-- LAMPIRAN 5 --}}
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran5) &&
                                ($spltlam5[2] == 'jpg' ||
                                    $spltlam5[2] == 'tiff' ||
                                    $spltlam5[2] == 'jfif' ||
                                    $spltlam5[2] == 'bmp' ||
                                    $spltlam5[2] == 'gif' ||
                                    $spltlam5[2] == 'svg' ||
                                    $spltlam5[2] == 'png' ||
                                    $spltlam5[2] == 'jpeg' ||
                                    $spltlam5[2] == 'jpg' ||
                                    $spltlam5[2] == 'webp' ||
                                    $spltlam5[2] == 'tif'))
                                <div class="item col-sm-3 col-md-3 mb-3">
                                    <a href="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran5) }}"
                                        class="fancybox" data-fancybox="gallery1"
                                        data-caption="Lampiran 5 <br> PTPP No {{ $d->nomor }} <b>({{ strtoupper($d->status) }})</b> <br> Dari : {{ $d->d_dept . ' ' . $d->dari }} <br> Kepada : {{ $d->k_dept . ' ' . $d->d_dept }}<br> Lokasi : {{ $d->lokasi }} <br> Obyek : {{ $d->obyek }}">
                                        <img src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran5) }}"
                                            width="100%" height="300em">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
