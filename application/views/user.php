<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
                <div class="row d-flex justify-content-between">
                  <div class="col-7 d-flex align-items-center">
                    <h5 class="text-white text-capitalize ps-3">Data Users</h5>
                  </div>
                  <div class="col-5 pe-4 text-end">
                      <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#addUser"> + </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-primary border-radius-lg pt-3 pb-1">
                            <div class="row d-flex justify-content-between">
                            <div class="col-7 d-flex align-items-center">
                                <h5 class="text-white text-capitalize ps-3">Form Tambah User</h5>
                            </div>
                            <div class="col-5 pe-4 text-end">
                                <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                            </div>
                            </div>
                        </div>
                      </div>
                      <?php echo form_open('user/add'); ?>
                      <div class="modal-body">
                          <?php echo validation_errors(); ?>
                          <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="user0" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="user0" name="nama">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="user1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="user1" name="username">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="user2" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="user2" name="pass">
                                    <?= form_error('pass', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="user3">Level</label>
                                    <select class="form-control" id="user3" name="level">
                                        <option value="Staff">Staff</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                    <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Level</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hak Akses</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $us) { ?>
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div>
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?= $us['u_name']; ?></h6>
                                <p class="text-xs text-secondary mb-0"><?= $us['u_uname']; ?></p>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle">
                            <span class="badge badge-sm bg-gradient-success"><?= $us['u_level']; ?></span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?= $us['u_access']; ?></span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <?php if ($us['u_status'] == 'active') {
                                echo '<span class="badge badge-sm bg-gradient-success">Active</span>';
                            } else {
                                echo '<span class="badge badge-sm bg-gradient-danger">Non-Active</span>';
                            } ?>
                            
                          </td>
                          <td class="text-center">
                            <?php if ($us['u_status'] == 'non') { ?>
                              <a href="<?= site_url('user/activate/' . $us['u_id']); ?>" class="mx-3" data-bs-original-title="Activate User <?= $us['u_name']; ?>" data-bs-toggle="tooltip">
                                  <i class="fas fa-solid fa-toggle-off text-info" aria-hidden="true"></i>
                              </a>
                            <?php } ?>
                            <?php if ($us['u_status'] == 'active') { ?>
                              <a href="<?= site_url('user/deactivate/' . $us['u_id']); ?>" class="mx-3" data-bs-original-title="Deactivate User <?= $us['u_name']; ?>" data-bs-toggle="tooltip">
                                  <i class="fas fa-solid fa-toggle-on text-info" aria-hidden="true"></i>
                              </a>
                            <?php } ?>
                              <a href="#" class="mx-3" data-bs-original-title="Change Password" data-bs-toggle="modal" data-bs-target="#changePassword">
                                  <i class="fas fa-solid fa-key text-info" aria-hidden="true"></i>
                              </a>
                              <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                          <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-1">
                                              <div class="row d-flex justify-content-between">
                                              <div class="col-7 d-flex align-items-center">
                                                  <h5 class="text-white text-capitalize ps-3">Form Change Password</h5>
                                              </div>
                                              <div class="col-5 pe-4 text-end">
                                                  <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                        <?= form_open('user/newpass/' . $us['u_id']); ?>
                                        <div class="modal-body text-start">
                                          <div class="form-group">
                                              <label for="pass<?= $us['u_id']; ?>" class="col-form-label">New Password</label>
                                              <input type="password" class="form-control" id="pass<?= $us['u_id']; ?>" name="newpass">
                                              <?= form_error('newpass', '<small class="text-danger">', '</small>'); ?>
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
                              <a href="#" class="mx-3" data-bs-original-title="Edit Hak Akses" data-bs-toggle="modal" data-bs-target="#editHakAkses<?= $us['u_id']; ?>">
                                  <i class="fas fa-solid fa-eye text-info" aria-hidden="true"></i>
                              </a>
                              <div class="modal fade" id="editHakAkses<?= $us['u_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editHakAkses<?= $us['u_id']; ?>Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                          <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-1">
                                              <div class="row d-flex justify-content-between">
                                              <div class="col-7 d-flex align-items-center">
                                                  <h5 class="text-white text-capitalize ps-3">Form Edit Hak Akses Data RT</h5>
                                              </div>
                                              <div class="col-5 pe-4 text-end">
                                                  <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                        <?= form_open('user/setAccess/' . $us['u_id']); ?>
                                        <?php 
                                        // $cek = array(); 
                                        $cek = explode(',', $us['u_access']);
                                        ?>
                                        <div class="modal-body text-start">
                                          <div class="row text-center">
                                              <div class="col-2">
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="akses[]" value="01" id="fcustomCheck1<?= $us['u_id']; ?>" <?php if (in_array(01, $cek)) { echo 'checked'; } ?>>
                                                    <label class="custom-control-label" for="customCheck1<?= $us['u_id']; ?>">01</label>
                                                  </div>
                                              </div>
                                              <div class="col-2">
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="akses[]" value="02" id="fcustomCheck2<?= $us['u_id']; ?>" <?php if (in_array(02, $cek)) { echo 'checked'; } ?>>
                                                    <label class="custom-control-label" for="customCheck2<?= $us['u_id']; ?>">02</label>
                                                  </div>
                                              </div>
                                              <div class="col-2">
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="akses[]" value="03" id="fcustomCheck3<?= $us['u_id']; ?>" <?php if(in_array(03, $cek)) { echo 'checked'; } ?>>
                                                    <label class="custom-control-label" for="customCheck3<?= $us['u_id']; ?>">03</label>
                                                  </div>
                                              </div>
                                              <div class="col-2">
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="akses[]" value="04" id="fcustomCheck4<?= $us['u_id']; ?>" <?php if(in_array(04, $cek)) { echo 'checked'; } ?>>
                                                    <label class="custom-control-label" for="customCheck4<?= $us['u_id']; ?>">04</label>
                                                  </div>
                                              </div>
                                              <div class="col-2">
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="akses[]" value="05" id="fcustomCheck5<?= $us['u_id']; ?>" <?php if(in_array(05, $cek)) { echo 'checked'; } ?>>
                                                    <label class="custom-control-label" for="customCheck5<?= $us['u_id']; ?>">05</label>
                                                  </div>
                                              </div>
                                              <div class="col-2">
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="akses[]" value="06" id="fcustomCheck6<?= $us['u_id']; ?>" <?php if(in_array(06, $cek)) { echo 'checked'; } ?>>
                                                    <label class="custom-control-label" for="customCheck6<?= $us['u_id']; ?>">06</label>
                                                  </div>
                                              </div>
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
                              <a href="#" class="mx-3" data-bs-original-title="Edit User Profile" data-bs-toggle="modal" data-bs-target="#editUserProfile<?= $us['u_id']; ?>">
                                  <i class="fas fa-edit text-info" aria-hidden="true"></i>
                              </a>
                              <!-- Modal -->
                              <div class="modal fade" id="editUserProfile<?= $us['u_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserProfile<?= $us['u_id']; ?>Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                          <div class="bg-gradient-info shadow-primary border-radius-lg pt-3 pb-1">
                                              <div class="row d-flex justify-content-between">
                                              <div class="col-7 d-flex align-items-center">
                                                  <h5 class="text-white text-capitalize ps-3">Form Edit User Profile</h5>
                                              </div>
                                              <div class="col-5 pe-4 text-end">
                                                  <button type="button" class="btn bg-gradient-danger btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage"> X </button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                        <?= form_open('user/editProfile/' . $us['u_id']); ?>
                                        <div class="modal-body text-start">
                                          <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="user0" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" value="<?= set_value('nama', $us['u_name']); ?>" id="user0" name="nama">
                                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="user1" class="form-label">Username</label>
                                                    <input type="text" class="form-control" value="<?= set_value('username', $us['u_uname']); ?>" id="user1" name="username">
                                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="user3">Level</label>
                                              <select class="form-control" id="user3" name="level">
                                                  <option value="Staff" <?= $us['u_level'] == 'Staff' ? 'selected' : ''; ?>>Staff</option>
                                                  <option value="Admin" <?= $us['u_level'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                                              </select>
                                              <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
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
                              <span data-bs-toggle="modal" data-bs-target="#deleteUkuran">
                                  <i class="cursor-pointer mx-3 fas fa-trash text-danger" aria-hidden="true"></i>
                              </span>
                              <div class="modal fade" id="deleteUkuran" tabindex="-1" role="dialog" aria-labelledby="deleteUkuran" aria-hidden="true">
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
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger">Hapus</button>
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