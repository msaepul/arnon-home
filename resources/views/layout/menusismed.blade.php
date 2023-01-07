<?php
$cabang = cabang();
$dept = Auth::user()->dept;
$level = Auth::user()->level;
?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{ url('layout/home') }}"
                class="nav-link {{ request()->is('layout/home') ? 'active' : '' }} {{ request()->is('/') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a href="{{ url('layout/add') }}" class="nav-link {{ request()->is('layout/add*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-circle-plus"></i>
                <p>
                    Buat PTPP
                </p>
            </a>
        </li> --}}
        <li class="nav-item {{ request()->is('layout/add*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('layout/add*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-circle-plus"></i>
                <p>
                    Buat PTPP
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @if ($level == 'cabang')
                    <li class="nav-item">
                        <a href="{{ url('layout/add/internal') }}"
                            class="nav-link {{ request()->is('layout/add/internal') ? 'active' : '' }}">
                            <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                            <p>Buat PTPP Internal </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('layout/add') }}"
                        class="nav-link {{ request()->is('layout/add') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>
                            Buat PTPP Eksternal
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        @if ($dept == 'SIS' || $dept == 'BM')
            <li class="nav-item">
                <a href="{{ url('layout/all') }}" class="nav-link {{ request()->is('layout/all*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Semua PTPP
                    </p>
                </a>
            </li>
        @endif

        @if ($dept == 'EDP' && $cabang == 'HO')
            <li class="nav-item {{ request()->is('home/index*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('home/index*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Halaman Admin
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../../index.html" class="nav-link">
                            <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                            <p>Tabel Utama</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('home/index') }}"
                            class="nav-link {{ request()->is('home/index*') ? 'active' : '' }}">
                            <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                            <p>Tabel Login</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html" class="nav-link">
                            <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                            <p>Tabel Lampiran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html" class="nav-link">
                            <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                            <p>Tabel Lampiran Close</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html" class="nav-link">
                            <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                            <p>Tabel Data Pendukung</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="nav-item {{ request()->is('layout/list/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('layout/list/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comment-dots"></i>
                <p>
                    PTPP
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('layout/list/dari') }}"
                        class="nav-link {{ request()->is('layout/list/dari') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>Dari {{ limits(allakses()) }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('layout/list/untuk') }}"
                        class="nav-link {{ request()->is('layout/list/untuk') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>Untuk {{ limits(allakses()) }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('layout/list/cancel') }}"
                        class="nav-link {{ request()->is('layout/list/cancel') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>PTPP Batal</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('layout/list/ditolak') }}"
                        class="nav-link {{ request()->is('layout/list/ditolak') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>PTPP Ditolak</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item {{ request()->is('layout/galeri/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('layout/galeri/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-photo-video"></i>
                <p>
                    Galeri
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('layout/galeri/foto') }}"
                        class="nav-link {{ request()->is('layout/galeri/foto') ? 'active' : '' }}">
                        <i class="fas fa-image nav-icon" style="zoom: 80%; margin-left: 10%;"></i>
                        <p> Foto </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('layout/galeri/video') }}"
                        class="nav-link {{ request()->is('layout/galeri/video') ? 'active' : '' }}">
                        <i class="fa fa-film nav-icon" style="zoom: 80%; margin-left: 10%;"></i>
                        <p> Video </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('layout/galeri/pdf') }}"
                        class="nav-link {{ request()->is('layout/galeri/pdf') ? 'active' : '' }}">
                        <i class="fa-solid fa-file-pdf nav-icon" style="zoom: 80%; margin-left: 10%;"></i>
                        <p> PDF </p>
                    </a>
                </li>
            </ul>
        </li>
        @if (akses()['SIS'] == 1)
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exportall">
                    <i class="nav-icon fas fa-file-invoice"></i>
                    <p>
                        Laporan PTPP
                    </p>
                </a>
            </li>
        @endif

    </ul>
</nav>
