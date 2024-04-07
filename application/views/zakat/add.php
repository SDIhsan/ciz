<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
            <div class="row d-flex justify-content-between">
              <div class="col-7 d-flex align-items-center">
                <h5 class="text-white text-capitalize ps-3">Tambah Zakat</h5>
              </div>
              <div class="col-5 pe-4 text-end">
                <a href="<?= site_url('zakat'); ?>" class="btn bg-gradient-danger" data-bs-toggle="tooltip">
                  <i class="fa fas-solid fa-arrow-left"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="col-lg-12">
            <!-- <section class="multi_step_form">   -->
              <!-- <?php $attr = array('id' => 'msform'); ?> -->
              <?= form_open('zakat/add'); ?>
              <div id="msform">
                <ul id="progressbar" class="text-center">
                  <li class="active">Warga</li>  
                  <li>Zakat</li> 
                  <li>Infaq</li>
                </ul>
                <hr class="bg-gradient-secondary">
                <!-- fieldsets -->
                <fieldset>
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="form-group">
                        <label for="zakat0" class="form-label">Nama Keluarga</label>
                        <input type="text" list="wargaList0" class="form-control" id="zakat0" name="nama">
                        <datalist id="wargaList0">
                            <?php foreach ($warga as $wl) {
                                echo '<option value="' . $wl['w_nama'] . '">' . $wl['w_nama'] . '</option>';
                            } ?>
                        </datalist>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label for="zakat1" class="form-label">RT</label>
                        <select class="form-control" id="zakat1" name="rt">
                            <option value=""></option>
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
                  <hr class="bg-gradient-secondary">
                  <!-- <div class="row"> -->
                    <button type="button" class="next btn bg-gradient-primary">Continue</button>  
                  <!-- </div> -->
                </fieldset>
                <fieldset>
                  <div id="formZ">
                    <div class="row" id="rid0">
                      <div class="col-7">
                        <div class="form-group">
                          <label for="zakat20" class="form-label">Jenis Zakat</label>
                          <select class="form-control" id="zakat20" name="jenis[]">
                            <option></option>
                            <?php 
                              foreach ($jenis as $j) {
                                echo '<option value="'. $j['j_id'] . '">' . $j['j_nama'] . ' - ' . $j['a_nama'] . '</option>';
                              }
                            ?>
                          </select>
                          <?= form_error('jenis[]', '<small class="text-danger">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="col-5">    
                        <div class="form-group">
                          <label for="zakat30" class="form-label">Jumlah Keluarga</label>
                          <input type="number" step="1" min="1" class="form-control" id="zakat30" value="" name="tanggungan[]">
                          <?= form_error('tanggungan[]', '<small class="text-danger">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="col-7">
                        <div class="form-group">
                            <label for="zakat40" class="form-label">Jumlah Zakat</label>
                            <input type="number" min="0" step="0.01" class="form-control" id="zakat40" name="jumlah[]">
                            <?= form_error('jumlah[]', '<small class="text-danger">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                            <label for="zakat50" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="zakat50" disabled>
                            <?= form_error('jumlah[]', '<small class="text-danger">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="col-lg-12 pt-2">
                        <button type="button" name="remove" id="0" class="btn bg-gradient-danger btn_remove" style="width: 100%;" data-bs-original-title="Delete" data-bs-toggle="tooltip">
                          <i class="fas fa-trash text-white" aria-hidden="true"></i>
                        </button>
                      </div>
                      <script>
                        let rt = $('#zakat1');
                        let tanggungan = $('#zakat30');
                        var keluarga;
                        $(document).on('change', '#zakat0', function(){
                          let url = '<?= site_url('warga/get_warga/'); ?>' + this.value;
                          $.getJSON(url, function(data){
                            rt.val(data.w_rt);
                            keluarga = data.w_anggota_keluarga;
                            tanggungan.val(keluarga);
                          });
                        });
                  
                        let satuan0 =  $('#zakat50');
                        var zakat0;
                        var kuantitas0;
                        let jumlah0 =  $('#zakat40');
                        $(document).on('change', '#zakat20', function(){
                          let url = '<?= site_url('zakat/get_jenis/'); ?>' + this.value;
                          $.getJSON(url, function(data){
                            satuan0.val(data.a_satuan);
                            kuantitas0 = data.j_kuantitas;
                            zakat0 = parseFloat(kuantitas0 * keluarga);
                            jumlah0.val(zakat0);
                            jumlah0.attr({"min" : zakat0});
                          });
                        });
                        $(document).on('change', '#zakat40', function(){
                          if (this.value < zakat0) {
                            jumlah0.val(zakat0);
                          }
                        });
                        $(document).on('change', '#zakat30', function(){
                          zakat0 = parseFloat(kuantitas0 * this.value);
                            jumlah0.val(zakat0);
                            jumlah0.attr({"min" : zakat0});
                        });
                      </script>
                      <hr class="bg-gradient-secondary mt-1">
                    </div>
                  </div>
                  <button type="button" class="next btn bg-gradient-primary">Continue</button>  
                  <script>let newkeluarga = keluarga;</script>
                  <button type="button" class="btn bg-gradient-secondary previous">Back</button>
                  <button type="button" class="btn bg-gradient-info" style="float: right;" name="addZ" id="addZ">+</button>
                </fieldset>  
                <fieldset>
                  <div class="form-group">
                      <label for="zakat6" class="col-form-label">Nominal Infaq</label>
                      <input type="number" min="0" step="0.01" class="form-control" id="zakat6" name="infaq">
                      <?= form_error('infaq', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <hr class="bg-gradient-secondary">
                  <button type="submit" class="btn bg-gradient-success">Save</a> 
                  <button type="button" class="btn bg-gradient-secondary previous">Back</button> 
                </fieldset> 
              </div>  
              <?= form_close(); ?>
            <!-- </section> / -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>