            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                <i class="avatar align-middle mr-1" data-feather="user"></i> <span class=" text-dark"><?= $this->session->userdata('nama') ?></span> </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="">Export Excel</a>
                                <!-- <a class="dropdown-item" href="<?= base_url('cetak/exportexcel') ?>">Export Excel</a> -->
                                <a class="dropdown-item" href="">Log Aktifitas User</a>
                                <!-- <a class="dropdown-item" href="<?= base_url('admin/log_user') ?>">Log Aktifitas User</a> -->
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>