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

        <!-- <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Data Pangkat">Data Pangkat</div>
            </a>
        </li> -->

        <!-- <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Data Bobot">Data Bobot</div>
            </a>
        </li> -->

        <!-- <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Data Kriteria">Data Kriteria</div>
            </a>
        </li> -->

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengguna</span></li>

        <li class="menu-item {{ request()->is('pengguna*') ? 'active' : '' }}">
            <a href="/pengguna" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="Data User">Data User</div>
            </a>
        </li>

    </ul>
</aside>
<!-- / Menu -->