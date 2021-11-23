<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><?= $title ? $title : 'Judul Page' ?></h3>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 col-xl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header text-right">
                    <a href="<?= base_url('admin/sarpras') ?>" class="btn btn-danger">
                        Kembali
                    </a>
                    <a href="<?= base_url('cetak/laporan_ruang/' . $id_ruang) ?>" target='_blank' class="btn btn-success">
                        Print
                    </a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah <?= $title ? $title : 'Judul Page' ?>
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-responsive table-sm p-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-midle">Kode Inventaris</th>
                                <th class="text-midle">Nama Barang</th>
                                <th class="text-midle">Jumlah</th>
                                <th class="text-midle">Tahun Masuk</th>
                                <th class="text-midle">Kondisi</th>
                                <th class="text-midle">Status</th>
                                <th class="text-midle">Foto</th>
                                <th class="text-midle">Keterangan</th>
                                <th class="text-midle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang_ruang as $no => $br) : ?>
                                <tr>
                                    <td><?= $no + 1; ?></td>
                                    <td><?= $br->kode_sarpras ?></td>
                                    <td><?= $br->nama_barang ?></td>
                                    <td><?= $br->jumlah ?></td>
                                    <td><?= $br->tahun_masuk ?></td>
                                    <td><?= $br->kondisi ?></td>
                                    <td><?= $br->status ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('uploads/img/sarpras/barang/' . $br->foto) ?>">
                                            <img src="<?= base_url('uploads/img/sarpras/barang/' . $br->foto) ?>" height="40px" alt="">
                                        </a>
                                    </td>
                                    <td><?= $br->keterangan ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/sarpras/edit/' . $br->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="<?= base_url('admin/sarpras/delete?id=' . $br->id . '&id_ruang=' . $br->id_ruang) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-eraser"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/sarpras/save') ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Ruang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?= $title ?>" readonly>
                    <input type="hidden" name="id_ruang" value="<?= $id_ruang ?>">
                    <input type="hidden" name="id_gedung" value="<?= $id_gedung ?>">
                    <input type="hidden" name="url" value="<?= uri_string() ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Barang <span class="text-danger">*</span></label>
                    <select name="id_barang" id="id_barang" class="form-control" required>
                        <option value="">Pilih Disini</option>
                        <?php foreach ($barang as $brg) : ?>
                            <option value="<?= $brg->id ?>"><?= $brg->nama_barang ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Masuk</label>
                    <input type="number" maxlength="4" class="form-control" name="tahun_masuk">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
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
                <div class="mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" name="id_status" id="id_status" required>
                        <option value="">Pilih Disini</option>
                        <?php foreach ($status as $s) : ?>
                            <option value="<?= $s->id ?>"><?= $s->status ?></option>
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