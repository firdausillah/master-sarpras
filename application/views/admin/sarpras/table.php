<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><?= $title ? $title : 'Judul Page' ?></h3>
        </div>

    </div>
    <div class="row">
        <div class="col-12 col-xl-8 d-flex">
            <div class="card flex-fill">
                <div class="card-header text-right">
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-responsive table-sm p-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-midle">Nama Gedung</th>
                                <th class="text-midle">Lantai</th>
                                <th class="text-midle">Kondisi</th>
                                <th class="text-midle">Jumlah Ruang</th>
                                <th class="text-midle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gedung as $no => $bar) : ?>
                                <tr>
                                    <td><?= $no + 1; ?></td>
                                    <td><a href="<?= base_url('admin/sarpras/gedung/' . $bar['id']) ?>" class="text-dark"><?= $bar['nama_gedung'] ?></a></td>
                                    <td><?= $bar['lantai'] ?></td>
                                    <td><?= $bar['kondisi'] ?></td>
                                    <td><?= $bar['jumlah_ruang'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/sarpras/gedung/' . $bar['id']) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>