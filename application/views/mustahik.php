<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Mustahik</h5>
                  </div>
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
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Keluarga</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($mustahik as $m) { ?>
                        <tr>
                          <td class="align-middle text-sm">
                            <span class="text-secondary ps-3 text-xs font-weight-bold"><?= $no++; ?></span>
                          </td>
                          <td class="align-middle text-sm">
                            <span class="text-secondary text-xs font-weight-bold"><?= $m['w_nama']; ?></span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold"><?= $m['w_rt']; ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?= $m['w_anggota_keluarga']; ?></span>
                          </td>
                          <td class="text-center">
                              <a href="#" class="mx-3" data-bs-original-title="Edit Status Warga" data-bs-toggle="modal" data-bs-target="#editWarga<?= $m['w_id']; ?>">
                                  <i class="fas fa-edit text-info" aria-hidden="true"></i>
                              </a>
                              <!-- Modal -->
                              <div class="modal fade" id="editWarga<?= $m['w_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editWarga<?= $m['w_id']; ?>Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                          <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-1">
                                              <div class="row d-flex justify-content-between">
                                              <div class="col-7 d-flex align-items-center">
                                                  <h5 class="text-white text-capitalize ps-3">Form Edit Status Warga</h5>
                                              </div>
                                              <div class="col-5 pe-4 text-end">
                                                  <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                        <?= form_open('mustahik/edit/' . $m['w_id']); ?>
                                        <div class="modal-body text-start">
                                          <div class="form-group">
                                              <label for="status<?= $m['w_id']; ?>" class="col-form-label">Status Warga</label>
                                              <select class="form-control" id="status<?= $m['w_id']; ?>" name="status">
                                              <option value="Muzakki" <?= $m['w_status_warga'] == 'Muzakki' ? 'selected' : ''; ?>>Muzakki</option>
                                              <option value="Mustahik" <?= $m['w_status_warga'] == 'Mustahik' ? 'selected' : ''; ?>>Mustahik</option>
                                              </select>
                                              <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn bg-gradient-primary">Save</button>
                                        </div>
                                        <?= form_close(); ?>
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