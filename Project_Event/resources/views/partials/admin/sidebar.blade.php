<div class="wrapper">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <span class="brand-text font-weight-light">AdminRetix</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                </div>
                <div class="info">
                    <a href="#" class="d-block">Rangga Prathama</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="{{ route('admin.home') }}" class="nav-link {{ request()->is('adminDashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>

                    </li>

                    <?php
                        $active = request()->is('user*') || request()->is('kategori*') || request()->is('event*') ||  request()->is('provinsi*') || request()->is('kota*') || request()->is('kecamatan*') || request()->is('detilEvent*') || request()->is('detilpemesanan*') || request()->is('pembayaran*') ||  request()->is('payments*');
                    ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ $active ? 'active' : '' }}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Tables
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user*') ? 'active' : '' }} ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->is('kategori*') ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Category Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('event.index') }}" class="nav-link {{ request()->is('event*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Event Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('provinsi.index') }}" class="nav-link {{ request()->is('provinsi*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Provinsi Tables</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('kota.index') }}" class="nav-link {{ request()->is('kota*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kota Tables</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('kecamatan.index') }}" class="nav-link {{ request()->is('kecamatan*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kecamatan Tables</p>
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href="{{ route('detilevent.index') }}" class="nav-link {{ request()->is('detilEvent*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Detil Event Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('detilPemesanan.index') }}" class="nav-link {{ request()->is('detilpemesanan*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pemesanan Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pembayaran.index') }}" class="nav-link {{ request()->is('pembayaran*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pembayaran Tables</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('payment.index') }}" class="nav-link {{ request()->is('payments*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Payments Tables</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>
