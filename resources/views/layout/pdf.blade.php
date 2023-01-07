@extends('main')

@section('judul')
@endsection

@section('isi')
    <title>App Central - File PDF</title>
    <section class="content-header" style="margin-top: -3%;">
        {{ Breadcrumbs::render('pdf') }}
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
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran1) && $spltlam1[2] == 'pdf')
                                <div class="item col-sm-12 col-md-6 mb-6">
                                    <embed type="application/pdf"
                                        src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran1) }}?view=FitH"
                                        width="100%" height="300em">
                                </div>
                            @endif

                            {{-- LAMPIRAN 2 --}}
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran2) && $spltlam2[2] == 'pdf')
                                <div class="item col-sm-12 col-md-6 mb-6">
                                    <embed type="application/pdf"
                                        src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran2) }}?view=FitH"
                                        width="100%" height="300em">
                                </div>
                            @endif

                            {{-- LAMPIRAN 3 --}}
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran3) && $spltlam3[2] == 'pdf')
                                <div class="item col-sm-12 col-md-6 mb-6">
                                    <embed type="application/pdf"
                                        src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran3) }}?view=FitH"
                                        width="100%" height="300em">
                                </div>
                            @endif

                            {{-- LAMPIRAN 4 --}}
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran4) && $spltlam4[2] == 'pdf')
                                <div class="item col-sm-12 col-md-6 mb-6">
                                    <embed type="application/pdf"
                                        src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran4) }}?view=FitH"
                                        width="100%" height="300em">
                                </div>
                            @endif

                            {{-- LAMPIRAN 5 --}}
                            @if (file_exists('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran5) && $spltlam5[2] == 'pdf')
                                <div class="item col-sm-12 col-md-6 mb-6">
                                    <embed type="application/pdf"
                                        src="{{ asset('storage/uploads/ptpp/lampiran/' . $split[1] . '/' . $lampiran5) }}?view=FitH"
                                        width="100%" height="300em">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
