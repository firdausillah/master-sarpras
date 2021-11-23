<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><?= $title ? $title : 'Judul Page' ?></h3>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 col-xl-8 d-flex">
            <div class="card flex-fill">
                <div class="card-header text-right">
                    <a href="<?= base_url('admin/sarpras') ?>" class="btn btn-warning">
                        Kembali
                    </a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah <?= $title ? $title : 'Judul Page' ?>
                    </button>
                </div>
                <div class="table-rensponsive">
                    <table id="myTable" class="table table-bordered table-responsive table-sm p-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-midle">Nama Ruang</th>
                                <th class="text-midle">Kondisi</th>
                                <th class="text-midle">Jumlah Barang</th>
                                <th class="text-midle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ruang as $no => $ru) : ?>
                                <tr>
                                    <td><?= $no + 1; ?></td>
                                    <td><a href="<?= base_url('admin/sarpras/ruang/' . $ru['id']) ?>" class="text-dark"><?= $ru['nama_ruang'] ?></a></td>
                                    <td><?= $ru['kondisi'] ?></td>
                                    <td><?= $ru['jumlah_barang'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/sarpras/ruang/' . $ru['id']) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/ruang/save') ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Gedung <span class="text-danger">*</span></label>
                    <input type="text" class="form-control"value="<?= $title ?>" readonly>
                    <input type="hidden"name="id_gedung" value="<?= $id_gedung ?>">
                    <input type="hidden"name="url" value="<?= uri_string() ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kode Ruang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kode_ruang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Ruang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_ruang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Panjang</label>
                    <input type="number" class="form-control" name="panjang" placeholder="dalam Meter">
                </div>
                <div class="mb-3">
                    <label class="form-label">Lebar</label>
                    <input type="number" class="form-control" name="lebar" placeholder="dalam Meter">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tinggi</label>
                    <input type="number" class="form-control" name="tinggi" placeholder="dalam Meter">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kondisi <span class="text-danger">*</span></label>
                    <select class="form-control" name="id_kondisi" id="id_kondisi" required>
                        <option value="">Pilih Disini</option>
                        <?php foreach ($kondisi as $k) : ?>
                            <option value="<?= $k->id ?>"><?= $k->kondisi ?></option>
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