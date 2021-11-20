<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><?= $title ? $title : 'Judul Page' ?></h3>
        </div>

    </div>
    <div class="row">
        <div class="col-12 col-lg-6 d-flex">
            <div class="card flex-fill">
                <?= form_open_multipart(base_url('admin/barang/update/' . $barang->id)) ?>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Barang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?= $barang->kode_barang ?>" name="kode_barang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?= $barang->nama_barang ?>" name="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Barang <span class="text-danger">*</span></label>
                        <select class="form-control" name="id_jenis_sarana" id="id_jenis_sarana" required>
                            <option value="">Pilih Disini</option>
                            <?php foreach ($jenis_sarana as $jenis) : ?>
                                <option <?= $barang->id_jenis_sarana == $jenis->id ? 'selected' : '' ?> value="<?= $jenis->id ?>"><?= $jenis->jenis_sarana ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= base_url() ?>admin/barang" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>