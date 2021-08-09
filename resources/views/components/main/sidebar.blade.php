<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ adminlte(LOGO) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Finansial</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route("dashboard") }}" class="nav-link {{ $menu == TAB_DASHBOARD ? "active" : "" }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- User -->
                <li class="nav-item {{ in_array($menu, [TAB_ADMIN, TAB_CUSTOMER, TAB_DEBTOR]) ? "menu-open" : "" }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("admin") }}" class="nav-link {{ $menu == TAB_ADMIN ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                            <a href="{{ route("customer") }}" class="nav-link {{ $menu == TAB_CUSTOMER ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pelanggan</p>
                            </a>
                            <a href="{{ route("debtor") }}" class="nav-link {{ $menu == TAB_DEBTOR ? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Debitur</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Savings -->
                <li class="nav-item">
                    <a href="{{ route("saving") }}" class="nav-link {{ $menu == TAB_SAVING ? "active" : "" }}">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Simpanan Keuangan</p>
                    </a>
                </li>

                <!-- Product -->
                <li class="nav-item {{ in_array($menu, [TAB_PRODUCT_LIST, TAB_PRODUCT_CATEGORY]) ? "menu-open" : "" }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Produk
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ $menu == TAB_PRODUCT_CATEGORY ? "active" : "" }}">
                            <a href="{{ route("product.category") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $menu == TAB_PRODUCT_LIST ? "active" : "" }}">
                            <a href="{{ route("product") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Transaction -->
                <li class="nav-item {{ in_array($menu, [TAB_TRANSACTION_CATEGORY, TAB_INCOME, TAB_EXPENSE]) ? "menu-open" : "" }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ $menu == TAB_TRANSACTION_CATEGORY ? "active" : "" }}">
                            <a href="{{ route("transaction.category") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $menu == TAB_INCOME ? "active" : "" }}">
                            <a href="{{ route("transaction.income") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $menu == TAB_EXPENSE ? "active" : "" }}">
                            <a href="{{ route("transaction.expense") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengeluaran</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Debt -->
                <li class="nav-item {{ in_array($menu, [TAB_DEBT_IN, TAB_DEBT_OUT]) ? "menu-open" : "" }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>
                            Hutang - Piutang
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ $menu == TAB_DEBT_IN ? "active" : "" }}">
                            <a href="{{ route("debt.in") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hutang</p>
                            </a>
                        </li>
                        <li class="nav-item {{ $menu == TAB_DEBT_OUT ? "active" : "" }}">
                            <a href="{{ route("debt.out") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Piutang</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Report -->
                <li class="nav-item">
                    <a href="{{ route("report") }}" class="nav-link {{ $menu == TAB_REPORT ? "active" : "" }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Laporan Keuangan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
