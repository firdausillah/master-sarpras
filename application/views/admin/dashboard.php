                <div class="container-fluid p-0">

                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><?= $title ? $title : 'Judul Page' ?></h3>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Jumlah asset(barang)</h5>
                                                <h1 class="mt-1 mb-3"></h1>
                                                <!-- <div class="mb-1">
                                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                                    <span class="text-muted">Since last week</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Jumlah Gedung</h5>
                                                <h1 class="mt-1 mb-3 text-success"></h1>
                                                <!-- <div class="mb-1">
                                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                                    <span class="text-muted">Since last week</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Jumlah ruangan</h5>
                                                <h1 class="mt-1 mb-3 text-danger"></h1>
                                                <!-- <div class="mb-1">
                                                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                                    <span class="text-muted">Since last week</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-5 col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Profile Sekolah</h5>
                                                <div class="text-center mb-4">
                                                    <img src="<?= base_url('assets/img/logo.png') ?>" height="90px" alt="">
                                                </div>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table class="table table-stripped">
                                                        <tr>
                                                            <td>Nama Sekolah</td>
                                                            <td>:</td>
                                                            <td><?= $profile->nama_sekolah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Kepala Sekolah</td>
                                                            <td>:</td>
                                                            <td><?= $profile->nama_kepalasekolah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat Sekolah</td>
                                                            <td>:</td>
                                                            <td><?= $profile->alamat ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tahun Ajaran</td>
                                                            <td>:</td>
                                                            <td><?= $profile->tahun_ajaran ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contact Person</td>
                                                            <td>:</td>
                                                            <td><?= $profile->cp_1 ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contact Person 2</td>
                                                            <td>:</td>
                                                            <td><?= $profile->cp_2 ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Website</td>
                                                            <td>:</td>
                                                            <td><?= $profile->website ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>