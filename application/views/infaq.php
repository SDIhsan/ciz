<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Infaq</h5>
                  </div>
                  <div class="col-5 pe-4 text-end">
                    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#addInfaq">
                      +
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="addInfaq" tabindex="-1" role="dialog" aria-labelledby="addInfaqTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                          <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                              <div class="row d-flex justify-content-between">
                              <div class="col-7 d-flex align-items-center">
                                  <h5 class="text-white text-capitalize ps-3">Form Tambah Infaq</h5>
                              </div>
                              <div class="col-5 pe-4 text-end">
                                  <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                              </div>
                              </div>
                          </div>
                        </div>
                        <?= form_open('infaq/add') ?>
                        <div class="modal-body text-start">
                            <div class="form-group">
                                <label for="infaq0" class="col-form-label">Nama Keluarga</label>
                                <input type="text" list="wargaList0" class="form-control" id="infaq0" name="nama">
                                <datalist id="wargaList0">
                                    <?php foreach ($warga as $wl) {
                                        echo '<option value="' . $wl['w_nama'] . '">' . $wl['w_nama'] . '</option>';
                                    } ?>
                                </datalist>
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="infaq1" class="col-form-label">Nominal</label>
                                <input type="number" step="1" min="0" class="form-control" id="infaq1" name="nominal">
                                <?= form_error('nominal', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-primary">Save</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-4 pt-2">
              <table id="myTable" class="table display align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Keluarga</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nominal</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($infaq as $i) { ?>
                        <tr>
                          <td class="align-middle mx-0 px-4">
                            <span class="text-secondary text-xs font-weight-bold"><?= $no++; ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?= $i['i_warga']; ?></span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success"><?= $i['i_waktu']; ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?= $i['i_nominal'] ?></span>
                          </td>
                          <td class="text-center">
                              <a href="#" class="mx-3" data-bs-original-title="Edit Infaq" data-bs-toggle="modal" data-bs-target="#editInfaq<?= $i['i_id']; ?>">
                                  <i class="fas fa-edit text-info" aria-hidden="true"></i>
                              </a>
                              <!-- Modal -->
                              <div class="modal fade" id="editInfaq<?= $i['i_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editInfaq<?= $i['i_id']; ?>Title" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                          <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                                              <div class="row d-flex justify-content-between">
                                              <div class="col-7 d-flex align-items-center">
                                                  <h5 class="text-white text-capitalize ps-3">Form Edit Infaq</h5>
                                              </div>
                                              <div class="col-5 pe-4 text-end">
                                                  <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                        <?= form_open('infaq/edit/' . $i['i_id']) ?>
                                        <div class="modal-body text-start">
                                            <div class="form-group">
                                                <label for="infaq2" class="col-form-label">Nama Keluarga</label>
                                                <input type="text" list="wargaList1" value="<?= set_value('nama', $i['i_warga']); ?>" class="form-control" id="infaq2" name="nama">
                                                <datalist id="wargaList1">
                                                    <?php foreach ($warga as $wl) {
                                                        echo '<option value="' . $wl['w_nama'] . '">' . $wl['w_nama'] . '</option>';
                                                    } ?>
                                                </datalist>
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="infaq3" class="col-form-label">Nominal</label>
                                                <input type="number" step="1" min="0" value="<?= set_value('nominal', $i['i_nominal']); ?>" class="form-control" id="infaq3" name="nominal">
                                                <?= form_error('nominal', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn bg-gradient-primary">Save</button>
                                        </div>
                                        <?= form_close() ?>
                                    </div>
                                </div>
                              </div>
                              <span data-bs-toggle="modal" data-bs-target="#deleteInfaq<?= $i['i_id']; ?>">
                                  <i class="cursor-pointer fas fa-trash text-danger" aria-hidden="true"></i>
                              </span>
                              <div class="modal fade" id="deleteInfaq<?= $i['i_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteInfaq<?= $i['i_id']; ?>" aria-hidden="true">
                                  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="py-3 text-center">
                                          <i class="ni ni-bell-55 ni-3x"></i>
                                          <h4 class="text-gradient text-danger mt-4">!!! Warning !!!</h4>
                                          <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                          <hr class="bg-gradient-secondary">
                                          <p class="font-weight-bold"><?= $i['i_warga'] . ' - ' . $i['i_nominal']; ?></p>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <a href="<?= site_url('infaq/delete/' . $i['i_id']); ?>" class="btn btn-danger">Hapus</a>
                                        <button type="button" class="btn btn-link text-primary ml-auto" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>