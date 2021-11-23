<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><?= $title ? $title : 'Judul Page' ?></h3>
        </div>

    </div>
    <div class="row">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah <?= $title ? $title : 'Judul Page' ?>
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-responsive table-sm p-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-midle">Kode Barang</th>
                                <th class="text-midle">Nama Barang</th>
                                <th class="text-midle">Jenis Barang</th>
                                <th class="text-midle">Jumlah</th>
                                <th class="text-midle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang as $no => $bar) : ?>
                                <tr>
                                    <td><?= $no + 1; ?></td>
                                    <td><?= $bar->kode_barang ?></td>
                                    <td><?= $bar->nama_barang ?></td>
                                    <td><?= $bar->jenis_sarana ?></td>
                                    <td><?= $bar->jumlah ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/barang/edit/' . $bar->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="<?= base_url('admin/barang/delete/' . $bar->id) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/barang/save') ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Kode barang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kode_barang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama barang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_barang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Barang <span class="text-danger">*</span></label>
                    <select class="form-control" name="id_jenis_sarana" id="id_jenis_sarana" required>
                        <option value="">Pilih Disini</option>
                        <?php foreach ($jenis_sarana as $jenis) : ?>
                            <option value="<?= $jenis->id ?>"><?= $jenis->jenis_sarana ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>