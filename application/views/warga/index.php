<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Warga</h5>
                  </div>
                  <div class="col-5 pe-4 text-end">
                    <a href="<?= site_url('warga/add'); ?>" class="mx-1 btn bg-gradient-success" data-bs-original-title="Tambah Warga" data-bs-toggle="tooltip">
                      <i class="fas fa-plus text-white" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-4 pt-2">
              <table id="myTable" class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Anggota Keluarga</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Warga</th>
                    <th class="text-secondary text-center text-uppercase text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($warga as $w) { ?>
                    <tr>
                      <td class="align-middle text-center">
                        <span class="text-xs font-weight-bold"><?= $no++; ?></span>
                      </td>
                      <td class="align-middle">
                        <span class="text-xs font-weight-bold"><?= $w['w_nama']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-xs font-weight-bold"><?= $w['w_anggota_keluarga']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-xs font-weight-bold"><?= $w['w_rt']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-xs font-weight-bold"><?= $w['w_status_warga']; ?></span>
                      </td>
                      <td class="text-center">
                          <a href="<?= site_url('warga/edit/' . $w['w_id']); ?>" class="mx-3" data-bs-original-title="Edit Data Warga" data-bs-toggle="tooltip">
                              <i class="fas fa-edit text-info" aria-hidden="true"></i>
                          </a>
                          <span data-bs-toggle="modal" data-bs-target="#deleteWarga<?= $w['w_id']; ?>">
                              <i class="cursor-pointer fas fa-trash text-danger" aria-hidden="true"></i>
                          </span>
                          <div class="modal fade" id="deleteWarga<?= $w['w_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteWarga<?= $w['w_id']; ?>" aria-hidden="true">
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
                                      <p class="font-weight-bold"><?= $w['w_nama'] . ' - RT.' . $w['w_rt']; ?></p>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="<?= site_url('warga/delete/' . $w['w_id']); ?>" class="btn btn-danger">Hapus</a>
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