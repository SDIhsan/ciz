<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Form Tambah Warga</h5>
                  </div>
                  <!-- <div class="col-5 pe-4 text-end">
                    <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#tambahZakat">
                      +
                    </button>
                  </div> -->
                </div>
              </div>
            </div>
          <div class="card-body px-0 pt-0 pb-2">
              <?= form_open(''); ?>
              <?php foreach ($warga as $we) {?>
                <div class="row px-2 pt-4">
                <div class="row mx-0">
                    <div class="form-group">
                        <label for="warga0" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="<?= set_value('nama',$we['w_nama']); ?>" id="warga0" name="nama">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="warga1" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" id="warga1" name="jenis-kelamin">
                                <option value=""></option>
                                <option value="L" <?= $we['w_jenis_kelamin'] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="P" <?= $we['w_jenis_kelamin'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                            <?= form_error('jenis-kelamin', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="warga2" class="form-label">Status Keluarga</label>
                            <select class="form-control" id="warga2" name="status-keluarga">
                                <option value=""></option>
                                <option value="Kepala Keluarga" <?= $we['w_status_keluarga'] == 'Kepala Keluarga' ? 'selected' : ''; ?>>Kepala Keluarga</option>
                                <option value="Istri" <?= $we['w_status_keluarga'] == 'Istri' ? 'selected' : ''; ?>>Istri</option>
                                <option value="Anak" <?= $we['w_status_keluarga'] == 'Anak' ? 'selected' : ''; ?>>Anak</option>
                            </select>
                            <?= form_error('status-keluarga', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="warga3" class="form-label">Jumlah Keluarga</label>
                            <input type="number" min="0" step="0" value="<?= set_value('jumlah',$we['w_jumlah_keluarga']); ?>" class="form-control" id="warga3" name="jumlah">
                            <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="warga4" class="form-label">RT</label>
                            <select class="form-control" id="warga4" name="rt">
                                <option value=""></option>
                                <option value="01" <?= $we['w_rt'] == 01 ? 'selected' : ''; ?>>01</option>
                                <option value="02" <?= $we['w_rt'] == 02 ? 'selected' : ''; ?>>02</option>
                                <option value="03" <?= $we['w_rt'] == 03 ? 'selected' : ''; ?>>03</option>
                                <option value="04" <?= $we['w_rt'] == 04 ? 'selected' : ''; ?>>04</option>
                                <option value="05" <?= $we['w_rt'] == 05 ? 'selected' : ''; ?>>05</option>
                                <option value="06" <?= $we['w_rt'] == 06 ? 'selected' : ''; ?>>06</option>
                            </select>
                            <?= form_error('rt', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="form-group">
                        <label for="warga5" class="form-label">Status Warga</label>
                        <select class="form-control" id="warga5" name="status-warga">
                            <option value=""></option>
                            <option value="Muzakki" <?= $we['w_status_warga'] == 'Muzakki' ? 'selected' : ''; ?>>Muzakki</option>
                            <option value="Mustahik" <?= $we['w_status_warga'] == 'Mustahik' ? 'selected' : ''; ?>>Mustahik</option>
                        </select>
                        <?= form_error('status-warga', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <hr class="bg-gradient-secondary">
            <div class="row px-1">
                <div class="col-12 px-4 mx-0 text-end">
                    <button type="submit" class="btn bg-gradient-primary" style="width: 100%;">Save</button>
                </div>
            </div>
            <?php } ?>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
</div>