<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                  <div class="row d-flex justify-content-between">
                    <div class="col-7 d-flex align-items-center">
                      <h5 class="text-white text-capitalize ps-3">Jenis Zakat</h5>
                    </div>
                    <div class="col-5 pe-4 text-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#addJenis"> + </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addJenis" tabindex="-1" role="dialog" aria-labelledby="addJenisTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                            <div class="row d-flex justify-content-between">
                            <div class="col-7 d-flex align-items-center">
                                <h5 class="text-white text-capitalize ps-3">Form Tambah Jenis Zakat</h5>
                            </div>
                            <div class="col-5 pe-4 text-end">
                                <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                            </div>
                            </div>
                        </div>
                      </div>
                      <?php echo form_open('atur/add_jenis'); ?>
                      <div class="modal-body">
                          <?php echo validation_errors(); ?>
                          <!-- <form> -->
                            <div class="form-group">
                                <label for="jenis0" class="col-form-label">Nama</label>
                                <input type="text" class="form-control" id="jenis0" name="nama">
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jenis1">Alat Pembayaran</label>
                                <select class="form-control" id="jenis1" name="alat">
                                <option value=""></option>
                                <?php foreach ($alat as $ao) {
                                    echo '<option value="'. $ao['a_id'] . '">' . $ao['a_nama'] . ' - ' . $ao['a_satuan'] . '</option>';
                                } ?>
                                </select>
                                <?= form_error('alat', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jenis2" class="col-form-label">Kuantitas</label>
                                <input type="number" min="0" step="0.01" class="form-control" id="jenis2" name="kuantitas">
                                <?= form_error('kuantitas', '<small class="text-danger">', '</small>'); ?>
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
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alat</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kuantitas</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jenis as $j) {
                        ?>
                        <tr>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-bold"><?= $no++; ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-bold"><?= $j['j_nama']; ?></span>
                          </td>
                          <td>
                            <?php foreach ($alat as $ad) { 
                                if ($ad['a_id'] == $j['j_alat']) { 
                                    echo '<p class="text-xs font-weight-bold mb-0">' . $ad['a_nama'] . '</p>';
                                    echo '<p class="text-xs text-secondary mb-0">' . $ad['a_satuan'] . '</p>';
                                } } ?>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-bold"><?= $j['j_kuantitas']; ?></span>
                          </td>
                          <td class="text-center">
                              <a href="#" class="mx-3" data-bs-original-title="Edit Jenis" data-bs-toggle="modal" data-bs-target="#editJenis<?= $j['j_id']; ?>">
                                  <i class="fas fa-edit text-info" aria-hidden="true"></i>
                              </a>
                              <!-- Modal -->
                              <div class="modal fade" id="editJenis<?= $j['j_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editJenis<?= $j['j_id']; ?>Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                          <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                                              <div class="row d-flex justify-content-between">
                                              <div class="col-7 d-flex align-items-center">
                                                  <h5 class="text-white text-capitalize ps-3">Form Edit Jenis</h5>
                                              </div>
                                              <div class="col-5 pe-4 text-end">
                                                  <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                        <?= form_open('atur/edit_jenis/' . $j['j_id']); ?>
                                        <div class="modal-body text-start">
                                            <div class="form-group">
                                                <label for="jenis3" class="col-form-label">Nama</label>
                                                <input type="text" value="<?= set_value('nama',$j['j_nama']); ?>" class="form-control" id="jenis3" name="nama">
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis4">Alat Pembayaran</label>
                                                <select class="form-control" id="jenis4" name="alat">
                                                  <?php foreach ($alat as $ao) { ?>
                                                    <option value="<?= $ao['a_id'] ?>" <?= $ao['a_id'] == $j['j_alat'] ? 'selected' : ''; ?>><?= $ao['a_nama'] . ' - ' . $ao['a_satuan'] ?></option>
                                                  <?php } ?>
                                                </select>
                                                </select>
                                                <?= form_error('alat', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis5" class="col-form-label">Kuantitas</label>
                                                <input type="number" min="0" step="0.01" value="<?= set_value('kuantitas', $j['j_kuantitas']); ?>" class="form-control" id="jenis5" name="kuantitas">
                                                <?= form_error('kuantitas', '<small class="text-danger">', '</small>'); ?>
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
                              <span data-bs-toggle="modal" data-bs-target="#deleteJenis<?= $j['j_id']; ?>">
                                  <i class="cursor-pointer fas fa-trash text-danger" aria-hidden="true"></i>
                              </span>
                              <div class="modal fade" id="deleteJenis<?= $j['j_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteJenis<?= $j['j_id']; ?>" aria-hidden="true">
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
                                          <p class="text-bold"><?= $j['j_nama']; ?></p>
                                        </div>
                                      </div>
                                      <?= form_open('atur/delete_jenis/' . $j['j_id']); ?>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <button type="button" class="btn btn-link text-primary ml-auto" data-bs-dismiss="modal">Close</button>
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
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Alat Pembayaran</h5>
                  </div>
                  <div class="col-5 pe-4 text-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#addAlat"> + </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addAlat" tabindex="-1" role="dialog" aria-labelledby="addAlatTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                            <div class="row d-flex justify-content-between">
                            <div class="col-7 d-flex align-items-center">
                                <h5 class="text-white text-capitalize ps-3">Form Tambah Alat</h5>
                            </div>
                            <div class="col-5 pe-4 text-end">
                                <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                            </div>
                            </div>
                        </div>
                      </div>
                      <?= form_open('atur/add_alat'); ?>
                      <div class="modal-body">
                            <div class="form-group">
                                <label for="ukuran0" class="col-form-label">Nama</label>
                                <input type="text" class="form-control" id="ukuran0" name="nama">
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="ukuran1">Satuan</label>
                                <select class="form-control" id="ukuran1" name="satuan">
                                <option value=""></option>
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
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Satuan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Action</th>
                    <!-- <th></th>/ -->
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($alat as $a) { ?>
                        <tr>
                          <td>
                            <p class="text-sm font-weight-bold mb-0 ps-3"><?= $no++; ?></p>
                          </td>
                          <td>
                            <p class="text-sm font-weight-bold mb-0"><?= $a['a_nama']; ?></p>
                          </td>
                          <td>
                            <p class="text-sm font-weight-bold mb-0"><?= $a['a_satuan']; ?></p>
                          </td>
                          <td class="text-center">
                              <a href="#" class="mx-3" data-bs-original-title="Edit Alat" data-bs-toggle="modal" data-bs-target="#editAlat<?= $a['a_id']; ?>">
                                  <i class="fas fa-edit text-info" aria-hidden="true"></i>
                              </a>
                              <!-- Modal -->
                              <div class="modal fade" id="editAlat<?= $a['a_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editAlat<?= $a['a_id']; ?>Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                          <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                                              <div class="row d-flex justify-content-between">
                                              <div class="col-7 d-flex align-items-center">
                                                  <h5 class="text-white text-capitalize ps-3">Form Edit Alat</h5>
                                              </div>
                                              <div class="col-5 pe-4 text-end">
                                                  <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                        <?= form_open('atur/edit_alat/' . $a['a_id']); ?>
                                        <div class="modal-body text-start">
                                              <div class="form-group">
                                                  <label for="alat2" class="col-form-label">Nama</label>
                                                  <input type="text" value="<?= set_value('nama', $a['a_nama']); ?>" class="form-control" id="alat2" name="nama">
                                                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                              </div>
                                              <div class="form-group">
                                                  <label for="alat3" class="col-form-label">Satuan</label>
                                                  <select class="form-control" id="alat3" name="satuan">
                                                  <option value=""></option>
                                                  <option value="Rupiah" <?= $a['a_satuan'] == 'Rupiah' ? 'selected' : ''; ?>>Rupiah</option>
                                                  <option value="Kg" <?= $a['a_satuan'] == 'Kg' ? 'selected' : ''; ?>>Kg</option>
                                                  <option value="g" <?= $a['a_satuan'] == 'g' ? 'selected' : ''; ?>>g</option>
                                                  </select>
                                                  <?= form_error('satuan', '<small class="text-danger">', '</small>'); ?>
                                              </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn bg-gradient-primary">Update</button>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                              </div>
                              <span data-bs-toggle="modal" data-bs-target="#deleteAlat<?= $a['a_id']; ?>">
                                  <i class="cursor-pointer fas fa-trash text-danger" aria-hidden="true"></i>
                              </span>
                              <div class="modal fade" id="deleteAlat<?= $a['a_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteAlat<?= $a['a_id']; ?>" aria-hidden="true">
                                  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                        </button>
                                      </div>
                                      <?= form_open('atur/delete_alat/' . $a['a_id']); ?>
                                      <div class="modal-body">
                                        <div class="py-3 text-center">
                                          <i class="ni ni-bell-55 ni-3x"></i>
                                          <h4 class="text-gradient text-danger mt-4">!!! Warning !!!</h4>
                                          <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                          <hr class="bg-gradient-secondary">
                                          <p class="text-bold"><?= '(' . $a['a_nama'] . ' - ' . $a['a_satuan'] . ')'; ?></p>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <button type="button" class="btn btn-link text-primary ml-auto" data-bs-dismiss="modal">Close</button>
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
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Jenis Penyaluran</h5>
                  </div>
                  <div class="col-5 pe-4 text-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#addJenisPenyaluran"> + </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addJenisPenyaluran" tabindex="-1" role="dialog" aria-labelledby="addJenisPenyaluranTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                            <div class="row d-flex justify-content-between">
                            <div class="col-7 d-flex align-items-center">
                                <h5 class="text-white text-capitalize ps-3">Form Tambah Jenis Penyaluran</h5>
                            </div>
                            <div class="col-5 pe-4 text-end">
                                <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                            </div>
                            </div>
                        </div>
                      </div>
                      <?= form_open('atur/add_jenis_penyaluran'); ?>
                      <div class="modal-body">
                            <div class="form-group">
                                <label for="ukuran0" class="form-label">Nama Jenis</label>
                                <input type="text" class="form-control" id="ukuran0" placeholder="Masukkan Nama Jenis Penyaluran...." name="nama">
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
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
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Action</th>
                    <!-- <th></th>/ -->
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jenis_penyaluran as $jp) { ?>
                        <tr>
                          <td>
                            <p class="text-sm font-weight-bold mb-0 ps-3"><?= $no++; ?></p>
                          </td>
                          <td>
                            <p class="text-sm font-weight-bold mb-0"><?= $jp['jp_nama']; ?></p>
                          </td>
                          <td class="text-center">
                              <a href="#" class="mx-3" data-bs-original-title="Edit Jenis Penyaluran" data-bs-toggle="modal" data-bs-target="#editJenisPenyaluran<?= $jp['jp_id']; ?>">
                                  <i class="fas fa-edit text-info" aria-hidden="true"></i>
                              </a>
                              <!-- Modal -->
                              <div class="modal fade" id="editJenisPenyaluran<?= $jp['jp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editJenisPenyaluran<?= $jp['jp_id']; ?>Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                          <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                                              <div class="row d-flex justify-content-between">
                                              <div class="col-7 d-flex align-items-center">
                                                  <h5 class="text-white text-capitalize ps-3">Form Edit Jenis Penyaluran</h5>
                                              </div>
                                              <div class="col-5 pe-4 text-end">
                                                  <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                        <?= form_open('atur/edit_jenis_penyaluran/' . $jp['jp_id']); ?>
                                        <div class="modal-body text-start">
                                              <div class="form-group">
                                                  <label for="alat2" class="col-form-label">Nama Jenis</label>
                                                  <input type="text" value="<?= set_value('nama', $jp['jp_nama']); ?>" class="form-control" id="alat2" placeholder="Masukkan Nama Jenis Penyaluran..." name="nama">
                                                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                              </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn bg-gradient-primary">Update</button>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                              </div>
                              <span data-bs-toggle="modal" data-bs-target="#deleteJenisPenyaluran<?= $jp['jp_id']; ?>">
                                  <i class="cursor-pointer fas fa-trash text-danger" aria-hidden="true"></i>
                              </span>
                              <div class="modal fade" id="deleteJenisPenyaluran<?= $jp['jp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteJenisPenyaluran<?= $jp['jp_id']; ?>" aria-hidden="true">
                                  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                        </button>
                                      </div>
                                      <?= form_open('atur/delete_jenis_penyaluran/' . $jp['jp_id']); ?>
                                      <div class="modal-body">
                                        <div class="py-3 text-center">
                                          <i class="ni ni-bell-55 ni-3x"></i>
                                          <h4 class="text-gradient text-danger mt-4">!!! Warning !!!</h4>
                                          <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                          <hr class="bg-gradient-secondary">
                                          <p class="text-bold"><?= '(' . $jp['jp_nama'] . ')'; ?></p>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <button type="button" class="btn btn-link text-primary ml-auto" data-bs-dismiss="modal">Close</button>
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