<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><?= $title ? $title : 'Judul Page' ?></h3>
        </div>

    </div>
    <div class="row">
        <div class="col-12 col-lg-6 d-flex">
            <div class="card flex-fill">
                <?= form_open_multipart(base_url('admin/gedung/update/' . $gedung->id)) ?>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Gedung <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?= $gedung->kode_gedung ?>" name="kode_gedung" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Gedung <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?= $gedung->nama_gedung ?>" name="nama_gedung" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Panjang</label>
                        <input type="number" class="form-control" value="<?= $gedung->panjang ?>" name="panjang" placeholder="dalam Meter">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lebar</label>
                        <input type="number" class="form-control" value="<?= $gedung->lebar ?>" name="lebar" placeholder="dalam Meter">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tinggi</label>
                        <input type="number" class="form-control" value="<?= $gedung->tinggi ?>" name="tinggi" placeholder="dalam Meter">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lantai</label>
                        <input type="number" class="form-control" value="<?= $gedung->lantai ?>" name="lantai">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <div class="row p-3">
                            <div class="col-12 text-center">
                                <a href="<?= base_url('uploads/img/sarpras/gedung/' . $gedung->foto) ?>">
                                    <img src="<?= base_url('uploads/img/sarpras/gedung/' . $gedung->foto) ?>" height="90px" alt="">
                                </a>
                            </div>
                        </div>
                        <input type="file" class="form-control" name="foto">
                        <input type="hidden" class="form-control" value="<?= $gedung->foto ?>" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kondisi <span class="text-danger">*</span></label>
                        <select class="form-control" name="id_kondisi" id="kid_kondisi" required>
                            <option value="">Pilih Disini</option>
                            <?php foreach ($kondisi as $k) : ?>
                                <option <?= $k->id == $gedung->id_kondisi ? 'selected' : '' ?> value="<?= $k->id ?>"><?= $k->kondisi ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= base_url() ?>admin/gedung" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>