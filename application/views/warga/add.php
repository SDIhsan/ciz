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
            <div class="row px-2 pt-4">
                <div class="row mx-0">
                    <div class="form-group">
                        <label for="warga0" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="warga0" placeholder="Nama Warga" name="nama">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="warga3" class="form-label">Anggota Keluarga</label>
                            <input type="number" min="0" step="0" class="form-control" id="warga3" placeholder="Jumlah anggota keluarga" name="jumlah">
                            <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="warga4" class="form-label">RT</label>
                            <select class="form-control" id="warga4" name="rt" aria-placeholder="Warga RT">
                                <option>-- Warga RT? --</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                            </select>
                            <?= form_error('rt', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="form-group">
                        <label for="warga5" class="form-label">Status Warga</label>
                        <select class="form-control" id="warga5" name="status-warga">
                            <option value="Muzakki">Muzakki</option>
                            <option value="Mustahik">Mustahik</option>
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
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
</div>