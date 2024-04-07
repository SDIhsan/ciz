<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Data Zakat</h5>
                  </div>
                  <div class="col-5 pe-4 text-end">
                    <a href="<?= site_url('zakat/add'); ?>" class="mx-3 btn bg-gradient-success" data-bs-original-title="Add Zakat" data-bs-toggle="tooltip">
                      <i class="fas fa-plus text-white" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-4 pt-2">
                <table id="myTable" class="table display align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Keluarga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Zakat</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggungan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($zakat as $z) { ?>
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 px-2"><?= $z['t_waktu']; ?></p>
                      </td>
                      <td class="align-middle">
                        <p class="text-xs font-weight-bold mb-0 px-2"><?= $z['t_warga']; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0 px-2"><?= $z['t_rt']; ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?= $z['j_nama'] . ' - ' . $z['a_nama']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0 px-2"><?= $z['t_tanggungan']; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= number_format($z['t_total'],2,',','.') . ' ' . $z['a_satuan']; ?></span>
                      </td>
                      <td class="text-center pe-3">
                        <a href="#" class="mx-3" data-bs-original-title="Edit Data Zakat" data-bs-toggle="modal" data-bs-target="#editZakat<?= $z['t_id']; ?>">
                            <i class="fas fa-edit text-info" aria-hidden="true"></i>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="editZakat<?= $z['t_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editZakat<?= $z['t_id']; ?>Title" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-1">
                                        <div class="row d-flex justify-content-between">
                                        <div class="col-7 d-flex align-items-center">
                                            <h5 class="text-white text-capitalize ps-3">Form Edit Data Zakat</h5>
                                        </div>
                                        <div class="col-5 pe-4 text-end">
                                            <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                  <?= form_open('zakat/edit/' . $z['t_id']) ?>
                                  <div class="modal-body text-start">
                                    <div class="row">
                                      <div class="col-9">
                                        <div class="form-group">
                                          <label for="zakat0<?= $z['t_id']; ?>" class="form-label">Nama Keluarga</label>
                                          <input type="text" list="wargaList0" value="<?= set_value('nama',$z['t_warga']); ?>" class="form-control" id="zakat0<?= $z['t_id']; ?>" name="nama">
                                          <datalist id="wargaList0">
                                              <?php foreach ($warga as $wl) {
                                                  echo '<option value="' . $wl['w_nama'] . '">' . $wl['w_nama'] . '</option>';
                                              } ?>
                                          </datalist>
                                          <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                      </div>
                                      <div class="col-3">
                                        <div class="form-group">
                                          <label for="zakat1<?= $z['t_id']; ?>" class="form-label">RT</label>
                                          <select class="form-control" id="zakat1<?= $z['t_id']; ?>" name="rt">
                                            <option value="01" <?= $z['t_rt'] == 01 ? 'selected' : ''; ?>>01</option>
                                            <option value="02" <?= $z['t_rt'] == 02 ? 'selected' : ''; ?>>02</option>
                                            <option value="03" <?= $z['t_rt'] == 03 ? 'selected' : ''; ?>>03</option>
                                            <option value="04" <?= $z['t_rt'] == 04 ? 'selected' : ''; ?>>04</option>
                                            <option value="05" <?= $z['t_rt'] == 05 ? 'selected' : ''; ?>>05</option>
                                            <option value="06" <?= $z['t_rt'] == 06 ? 'selected' : ''; ?>>06</option>
                                          </select>
                                          <?= form_error('rt', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="zakat2<?= $z['t_id']; ?>">Jenis Zakat</label>
                                      <select class="form-control" id="zakat2<?= $z['t_id']; ?>" name="jenis">
                                        <!-- <option></option> -->
                                        <?php 
                                          foreach ($jenis as $j) {
                                            echo '<option value="'. $j['j_id'] . '"'; 
                                            echo $j['j_id'] == $z['t_jenis'] ? 'selected' : '';
                                            echo '>' . $j['j_nama'] . ' - ' . $j['a_nama'] . '</option>';
                                          }
                                        ?>
                                      </select>
                                      <?= form_error('jenis', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <label for="zakat3<?= $z['t_id']; ?>" class="form-label">Jumlah Tanggungan/Keluarga</label>
                                      <input type="number" step="1" min="1" value="<?= set_value('tanggungan',$z['t_tanggungan']); ?>" class="form-control" id="zakat3<?= $z['t_id']; ?>" name="tanggungan">
                                      <?= form_error('tanggungan', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="zakat4<?= $z['t_id']; ?>" class="form-label">Total</label>
                                        <?php 
                                        if ($z['a_satuan'] === 'Rupiah') {
                                          $sujum = number_format($z['t_total'],0,',','');
                                        } elseif ($z['a_satuan'] === 'Kg' || 'g') {
                                          $sujum = number_format($z['t_total'],2);
                                        }
                                        ?>
                                        <input type="number" min="0" step="0.01" value="<?= set_value('jumlah', $sujum); ?>" class="form-control" id="zakat4<?= $z['t_id']; ?>" name="jumlah">
                                        <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
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
                        <span data-bs-toggle="modal" data-bs-target="#deleteZakat<?= $z['t_id']; ?>">
                            <i class="cursor-pointer fas fa-trash text-danger" aria-hidden="true"></i>
                        </span>
                        <div class="modal fade" id="deleteZakat<?= $z['t_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteZakat<?= $z['t_id']; ?>" aria-hidden="true">
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
                                    <p class="font-weight-bold"><?= $z['t_warga'] . ' - ' . $z['t_rt'] . ' - ' . $z['j_nama'] . '~' . $z['a_nama'] . ' - ' . number_format($z['t_total'],2,',','.') . ' ' . $z['a_satuan']; ?></p>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <a href="<?= site_url('zakat/delete/' . $z['t_id']); ?>" class="btn btn-danger">Hapus</a>
                                  <button type="button" class="btn btn-link text-primary ml-auto" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </td>
                    <?php } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>