<?php
$cabang = Auth::user()->cabang;
$dept = Auth::user()->dept;
$level = Auth::user()->level;
?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{ url('wodesain/home') }}" class="nav-link {{ request()->is('wodesain/home') ? 'active' : '' }}">
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
        @if ($level == 'cabang')
            <li class="nav-item {{ request()->is('wodesain/add*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('wodesain/add*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-circle-plus"></i>
                    <p>
                        Buat WO
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('wodesain/add/desain') }}"
                            class="nav-link {{ request()->is('wodesain/add/desain') ? 'active' : '' }}">
                            <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                            <p>Perubahan Desain </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('wodesain/add/ukuran') }}"
                            class="nav-link {{ request()->is('wodesain/add/ukuran') ? 'active' : '' }}">
                            <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                            <p> Perubahan Ukuran </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ request()->is('layout/list/cancel') ? 'active' : '' }}"
                            data-toggle="tooltip" data-placement="top"
                            title="Mohon Maaf, Menu Sedang dalam perbaikan 🙏🏻">
                            <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                            <p> Pengajuan Desain Baru </p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="nav-item {{ request()->is('wodesain/list/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('wodesain/list/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-receipt"></i>
                <p>
                    WO Desain
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('wodesain/list/wodesain') }}"
                        class="nav-link {{ request()->is('wodesain/list/wodesain') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>WO Desain {{ cabang() }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('wodesain/list/woukuran') }}"
                        class="nav-link {{ request()->is('wodesain/list/woukuran') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>WO Ukuran {{ cabang() }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('layout/list/cancel') ? 'active' : '' }}"
                        data-toggle="tooltip" data-placement="top" title="Mohon Maaf, Menu Sedang dalam perbaikan 🙏🏻">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>WO Desain Baru {{ cabang() }}</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ url('wodesain/masterdesain') }}"
                class="nav-link {{ request()->is('wodesain/masterdesain') ? 'active' : '' }}">
                <i class="nav-icon fas fa-box-archive"></i>
                <p>
                    Master Desain {{ cabang() }}
                </p>
            </a>
        </li>
    </ul>
</nav>
