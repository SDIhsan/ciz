<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Cetak Pembayaran Zakat & Infaq</h5>
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
            <?= form_open('printPDF'); ?>
            <div class="row px-2 pt-4">
                <div class="row mx-0">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="warga5" class="form-label">Nama Warga</label>
                            <select class="form-control" id="warga5" name="status-warga">
                                <option>Pilih Nama Warga/Keluarga</option>
                            <?php foreach ($warga as $wl) {
                                echo '<option value="' . $wl['t_warga'] . '">' . $wl['t_warga'] . '</option>';
                            } ?>
                            </select>
                            <?= form_error('status-warga', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="warga0" class="form-label">RT</label>
                            <input type="text" readonly="readonly" disabled class="form-control" id="warga0" placeholder="RT" name="rt">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="warga0" class="form-label">Tanggungan</label>
                            <input type="text" readonly="readonly" disabled class="form-control" id="warga0" placeholder="Tanggungan" name="tanggungan">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    
                </div>
            </div>
            <hr class="bg-gradient-secondary">
            <div class="row px-1">
                <div class="col-12 px-4 mx-0 text-end">
                    <button type="submit" class="btn bg-gradient-primary" style="width: 100%;">Cetak PDF</button>
                </div>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
</div>