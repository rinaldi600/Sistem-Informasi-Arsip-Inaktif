<nav id="sidebarMenu" class="sidebar-menu col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column list-menu">
            <li class="nav-item">
                <a class="nav-link <?= url_is('kategori_arsip*') ? 'active fw-bold text-dark' : '' ?>" aria-current="page" href="/kategori_arsip">
                    <span data-feather="home"></span>
                    Kategori Arsip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= url_is('klasifikasi_arsip*') ? 'active fw-bold text-dark' : '' ?>" href="/klasifikasi_arsip">
                    <span data-feather="file"></span>
                    Klasifikasi Arsip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= url_is('perkembangan_arsip*') ? 'active fw-bold text-dark' : '' ?>" href="/perkembangan_arsip">
                    <span data-feather="file"></span>
                    Perkembangan Arsip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= url_is('retensi_arsip*') ? 'active fw-bold text-dark' : '' ?>" href="/retensi_arsip">
                    <span data-feather="file"></span>
                    Retensi Arsip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= url_is('satuan_arsip*') ? 'active fw-bold text-dark' : '' ?>" href="/satuan_arsip">
                    <span data-feather="file"></span>
                    Satuan Arsip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= url_is('inaktif_arsip*') ? 'active fw-bold text-dark' : '' ?>" href="/inaktif_arsip">
                    <span data-feather="file"></span>
                    Inaktif Arsip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= url_is('kesimpulan_arsip*') ? 'active fw-bold text-dark' : '' ?>" href="/kesimpulan_arsip">
                    <span data-feather="file"></span>
                    Cari Kesimpulan Arsip
                </a>
            </li>

            <li>
                <a class="nav-link <?= url_is('setting*') ? 'active fw-bold text-dark' : '' ?>" href="/settings">
                    <span data-feather="file"></span>
                    Settings
                </a>
            </li>

            <li>
                <form action="/logout" method="post">
                    <button class="nav-link px-3 btn btn-danger ms-3 mt-5 text-white" type="submit">Sign Out</button>
                </form>
            </li>

        </ul>
    </div>
</nav>