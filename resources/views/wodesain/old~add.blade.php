@extends('main')

@section('judul')
@endsection

@section('isi')
    <title>Home App ~ WO Desain - Buat Wo Desain</title>
    @livewireStyles
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{ asset('dist/css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
    <div class="card-body">
        <livewire:wodesain />
    </div>
    @livewireScripts
@endsection
