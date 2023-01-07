<?php
$cabang = Auth::user()->cabang;
$dept = Auth::user()->dept;
$level = Auth::user()->level;
?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{ url('komunikasi/dashboard') }}"
                class="nav-link {{ request()->is('komunikasi/dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('komunikasi/add*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('komunikasi/add*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-circle-plus"></i>
                <p>
                    Buat Komunikasi
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('komunikasi/add/internal') }}"
                        class="nav-link {{ request()->is('komunikasi/add/internal') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>Komunikasi Internal</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('komunikasi/add/eksternal') }}"
                        class="nav-link {{ request()->is('komunikasi/add/eksternal') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>Komunikasi Eksternal</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item {{ request()->is('komunikasi/list/*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('komunikasi/list/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-receipt"></i>
                <p>
                    Komunikasi
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('komunikasi/list/internal') }}"
                        class="nav-link {{ request()->is('komunikasi/list/internal') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>Komunikasi Internal</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('komunikasi/list/eksternal') }}"
                        class="nav-link {{ request()->is('komunikasi/list/eksternal') ? 'active' : '' }}">
                        <i class="fas fa-stop nav-icon" style="zoom: 50%; margin-left: 10%;"></i>
                        <p>Komunikasi Eksternal</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
