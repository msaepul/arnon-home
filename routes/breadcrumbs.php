<?php

use Diglactic\Breadcrumbs\Breadcrumbs;


// SISMED
Breadcrumbs::for('home', function ($trail) {
    $trail->push("Dashboard PTPP", route('home'));
});
Breadcrumbs::for('add', function ($trail) {
    $trail->parent('home');
    $trail->push('Buat PTPP', route('layout.add'));
});
Breadcrumbs::for('foto', function ($trail) {
    $trail->parent('home');
    $trail->push('galeri Foto', route('layout.foto'));
});
Breadcrumbs::for('video', function ($trail) {
    $trail->parent('home');
    $trail->push('Galeri Video', route('layout.video'));
});
Breadcrumbs::for('pdf', function ($trail) {
    $trail->parent('home');
    $trail->push('File PDF', route('layout.pdf'));
});
Breadcrumbs::for('all', function ($trail) {
    $trail->parent('home');
    $trail->push('Semua PTPP', route('layout.all'));
});
Breadcrumbs::for('lateptpp', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Belum Analisa', route('layout.lateptpp'));
});
Breadcrumbs::for('cancel', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Batal', route('layout.cancel'));
});
Breadcrumbs::for('close', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Close', route('layout.close'));
});
Breadcrumbs::for('dari', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Dari Dept', route('layout.dari'));
});
Breadcrumbs::for('untuk', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Untuk Dept', route('layout.untuk'));
});
Breadcrumbs::for('confirm', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Confirm', route('layout.confirm'));
});
Breadcrumbs::for('confbm', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Confirm BM', route('layout.confbm'));
});
Breadcrumbs::for('ditolak', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Ditolak', route('layout.ditolak'));
});
Breadcrumbs::for('draft', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Draft', route('layout.draft'));
});
Breadcrumbs::for('unclose', function ($trail) {
    $trail->parent('home');
    $trail->push('PTPP Unclose', route('layout.unclose'));
});
Breadcrumbs::for('detail', function ($trail, $utama) {
    $before = $_GET['b'];
    $trail->parent("$before");
    $trail->push($utama->nomor, route('layout.detail', $utama->kode));
});
Breadcrumbs::for('edit', function ($trail, $utama) {
    $trail->parent("detail", $utama->nomor);
    $trail->push($utama->nomor, route('layout.edit', $utama->kode));
});





// WO DESAIN
Breadcrumbs::for('wohome', function ($trail) {
    $trail->push("Dashboard WO Desain", route('wodesain.home'));
});
Breadcrumbs::for('woadd', function ($trail) {
    $trail->parent('wohome');
    $trail->push('Buat Wo Desain', route('wodesain.add.desain'));
});
Breadcrumbs::for('wodesain', function ($trail) {
    $trail->parent('wohome');
    $trail->push('List WO Perubahan Desain ' . cabang(), route('wodesain'));
});
Breadcrumbs::for('woukuran', function ($trail) {
    $trail->parent('wohome');
    $trail->push('List WO Perubahan Ukuran ' . cabang(), route('woukuran'));
});
Breadcrumbs::for('wobaru', function ($trail) {
    $trail->parent('wohome');
    $trail->push('List WO Desain Baru ' . cabang(), route('wobaru'));
});
Breadcrumbs::for('desaindetail', function ($trail, $utama) {
    $b = $_GET['b'];
    if ($b == '0') {
        $before = 'wodesain';
        $bname = 'Perubahan Desain';
    } elseif ($b == '1') {
        $before = 'woukuran';
        $bname = 'Perubahan Ukuran';
    } elseif ($b == '2') {
        $before = 'wobaru';
        $bname = 'Desain Baru';
    }
    $trail->parent("$before");
    $trail->push('Detail ' . $bname, route('desaindetail', $utama->id));
});
Breadcrumbs::for('masterdesain', function ($trail) {
    $trail->parent('wohome');
    $trail->push('Master Desain ' . cabang(), route('masterdesain'));
});
Breadcrumbs::for('datasudahdihapus', function ($trail) {
    $trail->parent('masterdesain');
    $trail->push('Buat Wo Desain', route('masterdesain.hapus'));
});





// KOMUNIKASI
Breadcrumbs::for('komhome', function ($trail) {
    $trail->push("Dashboard Komunikasi", route('komunikasi.home'));
});
Breadcrumbs::for('komint', function ($trail) {
    $trail->parent('komhome');
    $trail->push('Buat Komunikasi Internal', route('add.internal'));
});
Breadcrumbs::for('komeks', function ($trail) {
    $trail->parent('komhome');
    $trail->push('Buat Komunikasi Eksternal', route('add.eksternal'));
});
Breadcrumbs::for('listint', function ($trail) {
    $trail->parent('komhome');
    $trail->push('Daftar Komunikasi Internal', route('list.internal'));
});
Breadcrumbs::for('listeks', function ($trail) {
    $trail->parent('komhome');
    $trail->push('Daftar Komunikasi Eksternal', route('list.eksternal'));
});
