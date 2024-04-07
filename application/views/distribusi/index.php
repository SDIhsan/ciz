<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Distribusi</h5>
                  </div>
                  <div class="col-5 pe-4 text-end">
                    <a href="<?= site_url('distribusi/add'); ?>" class="btn bg-gradient-info" data-bs-toggle="tooltip" data-bs-original-title="Tambah Pendistribusian">
                      +
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="addDistribusi" tabindex="-1" role="dialog" aria-labelledby="addDistribusiTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                            <div class="row d-flex justify-content-between">
                            <div class="col-7 d-flex align-items-center">
                                <h5 class="text-white text-capitalize ps-3">Form Tambah Pendistribusian</h5>
                            </div>
                            <div class="col-5 pe-4 text-end">
                                <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                            </div>
                            </div>
                        </div>
                      </div>
                      <?php echo form_open('distribusi/add'); ?>
                      <div class="modal-body">
                          <?php echo validation_errors(); ?>
                          <!-- <form> -->
                            <div class="form-group">
                              <label for="zakat0" class="form-label">Nama</label>
                              <input type="text" list="wargaList0" class="form-control" id="zakat0" name="nama">
                              <datalist id="wargaList0">
                                  <?php foreach ($mustahik as $wl) {
                                      echo '<option value="' . $wl['w_nama'] . '">' . $wl['w_nama'] . '</option>';
                                  } ?>
                              </datalist>
                              <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jenis2" class="form-label">Jumlah Hak</label>
                                <input type="number" min="0" step="0.01" class="form-control" id="jenis2" name="hak">
                                <?= form_error('hak', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                              <label for="ukuran1" class="col-form-label">Satuan</label>
                              <select class="form-control" id="ukuran1" name="satuan">
                                <option value="Rupiah">Rupiah</option>
                                <option value="Kg">Kg</option>
                                <option value="g">g</option>
                              </select>
                              <?= form_error('satuan', '<small class="text-danger">', '</small>'); ?>
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
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-4 pt-2">
              <table id="myTable" class="table display align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerima</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Hak</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Terdistribusi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Waktu Terdistribusi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($distribusi as $d) { ?>
                  <tr>
                    <td class="align-middle">
                      <span class="text-secondary text-xs ps-3 font-weight-bold"><?= $no++; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $d['d_penerima']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $d['d_jumlah_hak']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $d['d_jumlah_terdistribusi']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $d['d_hak_satuan']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $d['d_waktu_terdistribusi']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $d['d_keterangan']; ?></span>
                    </td>
                    <td class="text-center">
                      <?php 
                      if (!is_null($d['d_waktu_terdistribusi'])) { ?>
                        <a href="<?= site_url('distribusi/unverified/' . $d['d_id']); ?>" class="ms-3" data-bs-original-title="Belum Verifikasi" data-bs-toggle="tooltip">
                          <i class="fas fa-solid fa-circle text-danger" aria-hidden="true"></i>
                        </a>
                      <?php } else { ?>
                        <a href="<?= site_url('distribusi/verified/' . $d['d_id']); ?>" class="ms-3" data-bs-original-title="Verifikasi" data-bs-toggle="tooltip">
                          <i class="fas fa-solid fa-check text-success" aria-hidden="true"></i>
                        </a>
                      <?php } ?>
                      
                        <a href="#" class="mx-3" data-bs-original-title="Edit Distribusi" data-bs-toggle="modal" data-bs-target="#editDistribusi<?= $d['d_id']; ?>">
                            <i class="fas fa-edit text-info" aria-hidden="true"></i>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="editDistribusi<?= $d['d_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editDistribusi<?= $d['d_id']; ?>Title" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-1">
                                        <div class="row d-flex justify-content-between">
                                        <div class="col-7 d-flex align-items-center">
                                            <h5 class="text-white text-capitalize ps-3">Form Edit Data Distribusi</h5>
                                        </div>
                                        <div class="col-5 pe-4 text-end">
                                            <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                  <?php echo form_open('distribusi/edit/' . $d['d_id']); ?>
                                  <div class="modal-body">
                                      <?php echo validation_errors(); ?>
                                      <!-- <form> -->
                                        <div class="form-group">
                                          <label for="zakat0" class="form-label">Nama</label>
                                          <input type="text" list="wargaList0" value="<?= set_value('nama',$d['d_penerima']); ?>" class="form-control" id="zakat0" name="nama">
                                          <datalist id="wargaList0">
                                              <?php foreach ($mustahik as $wl) {
                                                  echo '<option value="' . $wl['w_nama'] . '">' . $wl['w_nama'] . '</option>';
                                              } ?>
                                          </datalist>
                                          <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="jenis2" class="form-label">Jumlah Hak</label>
                                                <?php 
                                                if ($d['d_hak_satuan'] === 'Rupiah') {
                                                  $nom = number_format($d['d_jumlah_hak'],0,',','');
                                                } elseif ($d['d_hak_satuan'] === 'Kg' || 'g') {
                                                  $nom = number_format($d['d_jumlah_hak'],2);
                                                }
                                                ?>
                                                <input type="number" min="0" step="0.01" value="<?= set_value('hak',$nom); ?>" class="form-control" id="jenis2" name="hak">
                                                <?= form_error('hak', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                          </div>
                                          <div class="col-lg-4">
                                            <div class="form-group">
                                              <label for="jenis2" class="form-label">Jumlah Terdistribusi</label>
                                              <?php 
                                              if ($d['d_jumlah_terdistribusi'] != null) {
                                                if ($d['d_hak_satuan'] === 'Rupiah') {
                                                  $dstri = number_format($d['d_jumlah_terdistribusi'],0,',','');
                                                } elseif ($d['d_hak_satuan'] === 'Kg' || 'g') {
                                                  $dstri = number_format($d['d_jumlah_terdistribusi'],2);
                                                }
                                                echo '<input type="number" min="0" step="0.01" class="form-control" value="' . set_value('hak',$dstri) . '" id="jenis2" name="terdistribusi">';
                                              } else {
                                                echo '<input type="number" min="0" step="0.01" class="form-control" id="jenis2" name="terdistribusi">';
                                              }
                                              ?>
                                              <?= form_error('terdistribusi', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                          </div>
                                          <div class="col-lg-4">
                                            <div class="form-group">
                                              <label for="ukuran1" class="form-label">Satuan</label>
                                              <select class="form-control" id="ukuran1" name="satuan">
                                                <option value="Rupiah" <?= $d['d_hak_satuan'] === 'Rupiah' ? 'selected' : ''; ?>>Rupiah</option>
                                                <option value="Kg" <?= $d['d_hak_satuan'] === 'Kg' ? 'selected' : ''; ?>>Kg</option>
                                                <option value="g" <?= $d['d_hak_satuan'] === 'g' ? 'selected' : ''; ?>>g</option>
                                              </select>
                                              <?= form_error('satuan', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlTextarea1">Keterangan</label>
                                          <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="3"><?= $d['d_keterangan']; ?></textarea>
                                          <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
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
                        <span data-bs-toggle="modal" data-bs-target="#deleteDistribusi<?= $d['d_id']; ?>">
                            <i class="cursor-pointer fas fa-trash text-danger" aria-hidden="true"></i>
                        </span>
                        <div class="modal fade" id="deleteDistribusi<?= $d['d_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteDistribusi<?= $d['d_id']; ?>" aria-hidden="true">
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
                                    <h4 class="text-gradient text-danger mt-4">You should read this!</h4>
                                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                    <hr class="bg-gradient-secondary">
                                    <p class="font-weight-bold"><?= $d['d_penerima'] . ' - ' . number_format($d['d_jumlah_terdistribusi'],2,',','.') . ' ' . $d['d_hak_satuan']; ?></p>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <a href="<?= site_url('distribusi/delete/' . $d['d_id']); ?>" class="btn btn-danger">Hapus</a>
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