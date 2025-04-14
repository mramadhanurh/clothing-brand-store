<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">Clothing Brand</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @if (Auth::user()->is_admin == '1')
            <!-- Dashboards -->
            <li class="menu-item {{ request()->is('admin*') ? 'active' : '' }}">
                <a href="/admin" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Master Data</span></li>

            <li class="menu-item {{ request()->is('kategori*') ? 'active' : '' }}">
                <a href="/kategori" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book-content"></i>
                    <div data-i18n="Data Kategori">Data Kategori</div>
                </a>
            </li>

            <li class="menu-item {{ request()->is('produk*') ? 'active' : '' }}">
                <a href="/produk" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                    <div data-i18n="Data Produk">Data Produk</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Order</span></li>

            <li class="menu-item {{ request()->is('orders*') ? 'active' : '' }}">
                <a href="/orders" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-cart"></i>
                    <div data-i18n="Data Pesanan">Data Pesanan</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengguna</span></li>

            <li class="menu-item {{ request()->is('pengguna*') ? 'active' : '' }}">
                <a href="/pengguna" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-pin"></i>
                    <div data-i18n="Data User">Data User</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Setting</span></li>

            <li class="menu-item {{ request()->is('setting*') ? 'active' : '' }}">
                <a href="/setting/1/edit" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-store"></i>
                    <div data-i18n="Setting Store">Setting Store</div>
                </a>
            </li>

            <li class="menu-item {{ request()->is('iklan*') ? 'active' : '' }}">
                <a href="/iklan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-window"></i>
                    <div data-i18n="Setting Iklan">Setting Iklan</div>
                </a>
            </li>
        @elseif (Auth::user()->is_admin == '0')

            <!-- Dashboards -->
            <li class="menu-item {{ request()->is('home*') ? 'active' : '' }}">
                <a href="/home" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Order</span></li>

            <li class="menu-item {{ request()->is('my-orders*') ? 'active' : '' }}">
                <a href="/my-orders" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-cart"></i>
                    <div data-i18n="Data Order">Data Order</div>
                </a>
            </li>

        @endif
    </ul>
</aside>
<!-- / Menu -->