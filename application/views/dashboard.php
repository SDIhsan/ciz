<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Keluarga Terdata</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $keluarga; ?>
                      <!-- <span class="text-success text-sm font-weight-bolder">Keluarga</span> -->
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Sudah Berzakat</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $berzakat; ?>
                      <span class="text-success text-sm font-weight-bolder">Keluarga</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Mustahik</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $mustahik; ?> 
                      <span class="text-success text-sm font-weight-bolder">Orang</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Zakat Terdistribusi</p>
                    <h5 class="font-weight-bolder mb-0">
                      $103,430
                      <span class="text-success text-sm font-weight-bolder">+5%</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-8 mb-lg-0 mb-4">
          <div class="card z-index-2">
              <div class="card-header pb-0">
                <h6>Orang yg Sudah Zakat Fitri</h6>
                <!-- <p class="text-sm">
                  <i class="fa fa-arrow-up text-success"></i>
                  <span class="font-weight-bold">4% more</span> in 2021
                </p> -->
              </div>
              <div class="card-body p-3">
                <div class="chart">
                  <canvas id="chart-line-0" class="chart-canvas" height="300"></canvas>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Zakat Fitrah (Uang)</p>
                        <h5 class="font-weight-bolder mb-0">
                          Rp<?php if (!is_null($fitrahuang)) { echo number_format($fitrahuang,0,',','.'); } else { echo 0; } ?>
                          <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Zakat Fitrah (Beras)</p>
                        <h5 class="font-weight-bolder mb-0">
                          <?php if (!is_null($fitrahberas)) { echo number_format($fitrahberas,2,',','.'); } else { echo 0; } ?> Kg
                          <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Zakat Maal (Uang)</p>
                        <h5 class="font-weight-bolder mb-0">
                        Rp<?php if (!is_null($fitrahberas)) { echo number_format($maaluang,0,',','.'); } else { echo 0; } ?>
                          <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Infaq</p>
                        <h5 class="font-weight-bolder mb-0">
                          Rp<?php if (!is_null($infaq)) { echo number_format($infaq,0,',','.'); } else { echo 0; } ?>
                          <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                        </h5>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row mt-4">
        <div class="col-lg-8 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Progress Zakat Fitri</h6>
                </div>
              </div>
            </div>
            <div class="card-body pt-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Muzakki</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keluarga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $rt = array_values(['01','02','03','04','05','06']);
                    $i = 0;
                    foreach ($progresszf as $pzf) {
                      // if ($rt) {
                        ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"><?php $drt = $rt[$i++]; $srt = intval($drt); echo $drt; ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"><?php if (!is_null($pzf[0]['ak'])) { echo $pzf[0]['ak']; } else { echo 0; } ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"><?php if (!is_null($pzf[0]['w'])) { echo $pzf[0]['w']; } else { echo 0; } ?></span>
                      </td>
                      <td class="align-middle">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <?php 
                              if ($drt == '01') {
                                $cs = $rt01;
                              } 
                              if ($drt == '02') {
                                $cs = $rt02;
                              } 
                              if ($drt == '03') {
                                $cs = $rt03;
                              } 
                              if ($drt == '04') {
                                $cs = $rt04;
                              }
                              if ($drt == '05') {
                                $cs = $rt05;
                              }
                              if ($drt == '06') {
                                $cs = $rt06;
                              } ?>
                              <span class="text-xs font-weight-bold"><?php $percentage = number_format($pzf[0]['w'] / $cs * 100,2,','); echo $percentage; ?>%</span>
                            </div>
                          </div>
                          <div class="progress w-max">
                            <div class="progress-bar bg-gradient-info w-<?= number_format($pzf[0]['w'] / $cs * 100,0); ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
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
        <div class="col-lg-4">
          <div class="card z-index-2">
            <div class="card-header pb-0">
              <h6>Sudah Menunaikan Zakat Fitri</h6>
              <!-- <p class="text-sm">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p> -->
            </div>
            <div class="card-body p-1">
              <div class="chart">
                <canvas id="chart-line-1" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <!-- <div class="col-lg-8">
          <div class="row"> -->
            <div class="col-lg-12 mb-lg-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Zakat Fitri Uang @Rp40000</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-3 pb-2">
                  <div class="row">
                    <div class="col-lg-7">
                      <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Muzakki</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Minimum</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lebihan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $rt = array_values(['01','02','03','04','05','06']);
                            $i = 0;
                            foreach ($zfuterkumpul as $zfut) {
                              // if ($rt) {
                                ?>
                            <tr>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php $drt = $rt[$i++]; $srt = intval($drt); echo $drt; ?></span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php if (!is_null($zfut[0]['ak'])) { echo $zfut[0]['ak']; } else { echo '0'; } ?></span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php if (!is_null($zfut[0]['t_total'])) { $totalzfu = $zfut[0]['t_total']; echo 'Rp' . number_format($totalzfu,0,',','.'); } else { echo 'Rp0'; } ?></span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php if (!is_null($zfut[0]['ak'])) { $minimumzfu = $zfum[0]->j_kuantitas * $zfut[0]['ak']; echo 'Rp' . number_format($minimumzfu,0,',','.'); } else { echo 'Rp0'; } ?></span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php $lebihzfu = $totalzfu - $minimumzfu; echo 'Rp' . number_format($lebihzfu,0,',','.'); ?></span>
                              </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="chart">
                        <canvas id="chart-bars-zfu" class="chart-canvas" height="300"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- </div>
          </div> -->
        </div>
        <!-- <div class="col-lg-4">
          <div class="card z-index-2">
            <div class="card-header pb-0">
              <h6>Statistik Waktu Zakat Fitri - Uang</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line-zf-1" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <div class="row mt-4">
        <!-- <div class="col-lg-8">
          <div class="row"> -->
            <div class="col-lg-12 mb-lg-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Zakat Fitri Beras @2,5 Kg</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-3 pb-2">
                  <div class="row">
                    <div class="col-lg-7">
                      <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Muzakki</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Minimum</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lebihan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $rt = array_values(['01','02','03','04','05','06']);
                            $i = 0;
                            foreach ($zfbterkumpul as $zfbt) {
                              // if ($rt) {
                                ?>
                            <tr>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php $drt = $rt[$i++]; $srt = intval($drt); echo $drt; ?></span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php if (!is_null($zfbt[0]['ak'])) { echo $zfbt[0]['ak']; } else { echo '0'; } ?></span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php if (!is_null($zfbt[0]['t_total'])) { $totalzfb = $zfbt[0]['t_total']; echo number_format($totalzfb,2,',','.'); } else { $totalzfb = 0; echo $totalzfb; } ?>Kg</span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php $minimumzfb = $zfbm[0]->j_kuantitas * $zfbt[0]['ak']; echo number_format($minimumzfb,2,',','.'); ?>Kg</span>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php $lebihzfb = $totalzfb - $minimumzfb; echo number_format($lebihzfb,2,',','.'); ?>Kg</span>
                              </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="chart">
                        <canvas id="chart-bars-zfb" class="chart-canvas" height="300"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- </div>
          </div> -->
        </div>
        <!-- <div class="col-lg-4">
          <div class="card z-index-2">
            <div class="card-header pb-0">
              <h6>Statistik Waktu Zakat Fitri - Uang</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line-zf-1" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>