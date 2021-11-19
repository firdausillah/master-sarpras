<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><?= $title ? $title : 'Judul Page' ?></h3>
        </div>

    </div>
    <div class="row">
        <div class="col-12 col-lg-6 d-flex">
            <div class="card flex-fill">
                <?= form_open_multipart(base_url('admin/sarpras/update/' . $barang_ruang->id)) ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Ruang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?= $barang_ruang->nama_ruang ?>" readonly>
                        <input type="hidden" name="id_ruang" value="<?= $id_ruang ?>">
                        <input type="hidden" name="id_gedung" value="<?= $id_gedung ?>">
                        <input type="hidden" name="url" value="<?= uri_string() ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang <span class="text-danger">*</span></label>
                        <select name="id_barang" id="id_barang" class="form-control" required>
                            <option value="">Pilih Disini</option>
                            <?php foreach ($barang as $brg) : ?>
                                <option <?= $barang_ruang->id_barang == $brg->id ? 'selected' : '' ?> value="<?= $brg->id ?>"><?= $brg->nama_barang ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="<?= $barang_ruang->jumlah ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Masuk</label>
                        <input type="number" maxlength="4" class="form-control" name="tahun_masuk" value="<?= $barang_ruang->tahun_masuk ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <div class="row p-3">
                            <div class="col-12 text-center">
                                <a href="<?= base_url('uploads/img/sarpras/barang/' . $barang_ruang->foto) ?>">
                                    <img src="<?= base_url('uploads/img/sarpras/barang/' . $barang_ruang->foto) ?>" height="90px" alt="">
                                </a>
                            </div>
                        </div>
                        <input type="file" class="form-control" name="foto">
                        <input type="hidden" class="form-control" value="<?= $barang_ruang->foto ?>" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"><?= $barang_ruang->keterangan ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kondisi <span class="text-danger">*</span></label>
                        <select class="form-control" name="id_kondisi" id="id_kondisi" required>
                            <option value="">Pilih Disini</option>
                            <?php foreach ($kondisi as $k) : ?>
                                <option <?= $barang_ruang->id_kondisi == $k->id ? 'selected' : '' ?> value="<?= $k->id ?>"><?= $k->kondisi ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" name="id_status" id="id_status" required>
                            <option value="">Pilih Disini</option>
                            <?php foreach ($status as $s) : ?>
                                <option <?= $barang_ruang->id_status == $s->id ? 'selected' : '' ?> value="<?= $s->id ?>"><?= $s->status ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= base_url() ?>admin/sarpras/ruang/<?= $barang_ruang->id_ruang ?>" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>