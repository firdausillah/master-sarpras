<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-center" href="<?= base_url() ?>assets/index.html">
            <span class="align-middle">ADMIN SARPRAS</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <?php $url = $this->uri->segment(2); ?>
            <li class="sidebar-item <?= $url == 'dashboard' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= base_url() ?>admin/dashboard">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item <?= $url == 'gedung' ||  $url == 'ruang' ||  $url == 'barang' ? 'active' : '' ?>">
                <a data-target="#forms" data-toggle="collapse" class="sidebar-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle align-middle">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg> <span class="align-middle">Data Master</span>
                </a>
                <ul id="forms" class="sidebar-dropdown list-unstyled collapse <?= $url == 'gedung' ||  $url == 'ruang' ||  $url == 'barang' ? 'show' : '' ?>" data-parent="#sidebar">
                    <li class="sidebar-item <?= $url == 'gedung' ? 'active' : '' ?>"><a class="sidebar-link" href="<?= base_url() ?>admin/gedung">Gedung</a></li>
                    <li class="sidebar-item <?= $url == 'ruang' ? 'active' : '' ?>"><a class="sidebar-link" href="<?= base_url() ?>admin/ruang">Ruang</a></li>
                    <li class="sidebar-item <?= $url == 'barang' ? 'active' : '' ?>"><a class="sidebar-link" href="<?= base_url() ?>admin/barang">Barang</a></li>
                </ul>
            </li>

            <li class="sidebar-item <?= $url == 'sarpras' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= base_url() ?>admin/sarpras">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Sarpras</span>
                </a>
            </li>
            <li class="sidebar-item <?= $url == 'user' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= base_url() ?>admin/user">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">User</span>
                </a>
            </li>
            <li class="sidebar-item <?= $url == 'profile' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= base_url() ?>admin/profile">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Profile</span>
                </a>
            </li>

        </ul>

    </div>
</nav>