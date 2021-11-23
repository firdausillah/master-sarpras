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
                                <th class="text-midle">Nama Gedung</th>
                                <th class="text-midle">Kode Ruang</th>
                                <th class="text-midle">Nama Ruang</th>
                                <th class="text-midle">Panjang</th>
                                <th class="text-midle">Lebar</th>
                                <th class="text-midle">Tinggi</th>
                                <th class="text-midle">Foto</th>
                                <th class="text-midle">Kondisi</th>
                                <th class="text-midle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ruang as $no => $room) : ?>
                                <tr>
                                    <td><?= $no + 1; ?></td>
                                    <td><?= $room->nama_gedung ?></td>
                                    <td><?= $room->kode_ruang ?></td>
                                    <td><?= $room->nama_ruang ?></td>
                                    <td><?= $room->panjang ?> Meter</td>
                                    <td><?= $room->lebar ?> Meter</td>
                                    <td><?= $room->tinggi ?> Meter</td>
                                    <td class="text-center">
                                        <a href="<?= base_url('uploads/img/sarpras/ruang/' . $room->foto) ?>">
                                            <img src="<?= base_url('uploads/img/sarpras/ruang/' . $room->foto) ?>" height="40px" alt="">
                                        </a>
                                    </td>
                                    <td><?= $room->kondisi ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/ruang/edit/' . $room->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="<?= base_url('admin/ruang/delete/' . $room->id) ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></a>
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
                    <select class="form-control" name="id_gedung" id="id_gedung" required>
                        <option value="">Pilih Disini</option>
                        <?php foreach ($gedung as $g) : ?>
                            <option value="<?= $g->id ?>"><?= $g->nama_gedung ?></option>
                        <?php endforeach ?>
                    </select>
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