<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-1">
            <div class="row d-flex justify-content-between">
              <div class="col-7 d-flex align-items-center">
                <h5 class="text-white text-capitalize ps-3">Tambah Pendistribusian</h5>
              </div>
              <div class="col-5 pe-4 text-end">
                <a href="<?= site_url('distribusi'); ?>" class="btn bg-gradient-danger" data-bs-toggle="tooltip">
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
              <?= form_open('distribusi/add'); ?>
              <div id="msform">
                <ul id="progressbar" class="text-center" style="padding-left: 0;">
                  <li class="active">Mustahik</li>  
                  <li>Distribusi</li> 
                  <li>Keterangan</li>
                </ul>
                <hr class="bg-gradient-secondary">
                <!-- fieldsets -->
                <fieldset>
                  <div class="row">
                    <div class="col-lg-7">
                      <div class="form-group">
                        <label for="distribusi0" class="form-label">Atas Nama</label>
                        <input type="text" list="wargaList0" class="form-control" id="distribusi0" placeholder="Mohon Masukkan Nama Mustahik..." name="nama">
                        <datalist id="wargaList0">
                          <?php foreach ($mustahik as $wl) {
                              echo '<option value="' . $wl['w_nama'] . '">' . $wl['w_nama'] . '</option>';
                          } ?>
                      </datalist>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label for="distribusi1" class="form-label">RT</label>
                        <select class="form-control" id="distribusi1" name="rt">
                          <option>- Pilih RT? -</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label for="distribusi2" class="form-label">Jenis Penyaluran</label>
                        <select class="form-control" id="distribusi2" name="jenisalur">
                          <option>- Silahkan Pilih Jenis Penyaluran.... -</option>
                          <?php foreach ($jenisPenyaluran as $jp) {
                              echo '<option value="' . $jp['jp_id'] . '">' . $jp['jp_nama'] . '</option>';
                          } ?>
                        </select>
                        <?= form_error('jenisalur', '<small class="text-danger">', '</small>'); ?>
                      </div>
                    </div>
                  </div>
                  <script>
                    let rt = $('#distribusi1');
                    // let jenissalur = $('#distribusi2');
                    $(document).on('change', '#distribusi0', function(){
                      // var opt = $('option[value="' + $(this).val() + '"]');
                      var opt = $('datalist#wargaList0').children("option:selected").val();
                      let url = '<?= site_url('warga/get_warga/'); ?>' + opt;
                      $.getJSON(url, function(data){
                        rt.val(data.w_rt);
                        $("#distribusi2 option[value='1']").prop("selected", true)
                        // jenissalur.val('01');
                      });
                    });
                  </script>
                  <hr class="bg-gradient-secondary">
                  <!-- <div class="row"> -->
                    <button type="button" class="next btn bg-gradient-primary">Next</button>  
                  <!-- </div> -->
                </fieldset>
                <fieldset>
                  <div id="formD">
                    <div class="row" id="rid0">
                      <div class="col-lg-7">
                        <div class="form-group">
                          <label for="distribusi30" class="form-label">Apa yang ingin didistribusikan?</label>
                          <select class="form-control" id="distribusi30" name="jenis[]">
                            <option>Silahkan pilih...</option>
                            <?php 
                              foreach ($jenis as $j) {
                                echo '<option value="'. $j['j_id'] . '">' . $j['j_nama'] . ' - ' . $j['a_nama'] . '</option>';
                              }
                            ?>
                            <option value="infak">Infak</option>
                          </select>
                          <?= form_error('jenis[]', '<small class="text-danger">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="distribusi4a0" class="form-label">Ketersediaan</label>
                              <input type="text" readonly disabled class="form-control" id="distribusi4a0" value="">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="distribusi4b0" class="form-label">Masih</label>
                              <input type="text" readonly disabled class="form-control" id="distribusi4b0" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-7">
                        <div class="form-group">
                            <label for="distribusi50" class="form-label">Nominal</label>
                            <input type="number" min="0" step="0.01" class="form-control" value="0" id="distribusi50" name="nominal[]">
                            <?= form_error('nominal[]', '<small class="text-danger">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                            <label for="distribusi60" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="distribusi60" readonly disabled>
                        </div>
                      </div>
                      <div class="col-lg-12 pt-2">
                        <button type="button" name="remove" id="0" class="btn bg-gradient-danger btn_remove" style="width: 100%;" data-bs-original-title="Delete" data-bs-toggle="tooltip">
                          <i class="fas fa-trash text-white" aria-hidden="true"></i>
                        </button>
                      </div>
                      <script>
                        let jenis0 = $('#distribusi30');
                        let tersedia0 = $('#distribusi4a0');
                        let masih0 = $('#distribusi4b0');
                        let nominal0 = $('#distribusi50');
                        let satuan0 = $('#distribusi60');
                        var ketersediaan0;
                        var url1s;
                        var currency0;
                        $(document).on('change', '#distribusi30', function(){
                          if (this.value != 'infak') {
                            url1s = '<?= site_url('zakat/get_jenis/'); ?>' + this.value;
                          };
                          if (this.value == 1) {
                            let url1 = '<?= site_url('distribusi/getZFU'); ?>';
                            $.getJSON(url1, function(data){
                              ketersediaan0 = data;
                              tersedia0.val('Rp' + parseFloat(ketersediaan0));
                              masih0.val('Rp' + parseFloat(ketersediaan0));
                              nominal0.attr({"max" : ketersediaan0});
                              nominal0.attr({"step" : "1"});
                              if (parseFloat(nominal0.val()) > parseFloat(ketersediaan0)) {
                                nominal0.val(parseFloat(ketersediaan0));
                                masih0.val('Rp' + 0);
                              }
                            });
                            $.getJSON(url1s, function(data){
                              currency0 = data.a_satuan;
                              satuan0.val(currency0);
                            });
                          };
                          if (this.value == 2) {
                            let url2 = '<?= site_url('distribusi/getZFB'); ?>';
                            $.getJSON(url2, function(data){
                              ketersediaan0 = data;
                              tersedia0.val(parseFloat(ketersediaan0) + ' Kg');
                              masih0.val(parseFloat(ketersediaan0) + ' Kg');
                              nominal0.attr({"max" : ketersediaan0});
                              nominal0.attr({"step" : "0.01"});
                              if (parseFloat(nominal0.val()) > parseFloat(ketersediaan0)) {
                                nominal0.val(parseFloat(ketersediaan0));
                                masih0.val(0 + ' Kg');
                              }
                            });
                            $.getJSON(url1s, function(data){
                              currency0 = data.a_satuan;
                              satuan0.val(currency0);
                            });
                          };
                          if (this.value == 3) {
                            let url3 = '<?= site_url('distribusi/getZMU'); ?>';
                            $.getJSON(url3, function(data){
                              ketersediaan0 = data;
                              tersedia0.val('Rp' + parseFloat(ketersediaan0));
                              masih0.val('Rp' + parseFloat(ketersediaan0));
                              nominal0.attr({"max" : ketersediaan0});
                              nominal0.attr({"step" : "1"});
                              if (parseFloat(nominal0.val()) > parseFloat(ketersediaan0)) {
                                nominal0.val(parseFloat(ketersediaan0));
                                masih0.val('Rp' + 0);
                              }
                            });
                            $.getJSON(url1s, function(data){
                              currency0 = data.a_satuan;
                              satuan0.val(currency0);
                            });
                          };
                          if (this.value == 'infak') {
                            let url4 = '<?= site_url('distribusi/getI'); ?>';
                            $.getJSON(url4, function(data){
                              ketersediaan0 = data;
                              tersedia0.val('Rp' + parseFloat(ketersediaan0))
                              masih0.val('Rp' + parseFloat(ketersediaan0))
                              satuan0.val('Rupiah');
                              nominal0.attr({"max" : ketersediaan0});
                              nominal0.attr({"step" : "1"});
                              if (parseFloat(nominal0.val()) > parseFloat(ketersediaan0)) {
                                nominal0.val(parseFloat(ketersediaan0));
                                masih0.val('Rp' + 0);
                              }
                            });
                          };
                        });
                        $(document).on('change', '#distribusi50', function(){
                          if (parseFloat(this.value) > parseFloat(ketersediaan0)) {
                            nominal0.val(parseFloat(ketersediaan0));
                            if (jenis0.val() == 2) {
                              masih0.val(0 + ' Kg');
                            } else {
                              masih0.val('Rp' + 0);
                            }
                          }
                        });
                        $(document).on('keyup', '#distribusi50', function() {
                          if (jenis0.val() == 2) {
                            let totalSedia = parseFloat(ketersediaan0) - parseFloat(this.value);
                            masih0.val(Number(totalSedia.toFixed(2)) + ' Kg');
                          } else {
                            let totalSedia1 = parseInt(ketersediaan0) - parseInt(this.value);
                            masih0.val('Rp' + Number(totalSedia1));
                          }
                        });
                      </script>
                      <hr class="bg-gradient-secondary mt-1">
                    </div>
                  </div>
                  <button type="button" class="next btn bg-gradient-primary">Next</button>
                  <button type="button" class="btn bg-gradient-secondary previous">Back</button>
                  <button type="button" class="btn bg-gradient-info" style="float: right;" name="addD" id="addD">+</button>
                </fieldset>  
                <fieldset>
                  <div class="form-group">
                      <label for="distribusi7" class="col-form-label">Keterangan</label>
                      <textarea class="form-control" id="distribusi7" name="keterangan" cols="30" rows="10"></textarea>
                      <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
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