<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    AZCI ~ <?= $title; ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <main class="main-content bg-white text-black mt-0">
    <section class="min-vh-100 mb-8">
        <div class="row p-4">
            <div class="col-3 text-center">
                <div class="row">
                    <div class="col-12">
                        <h2>Masjid</h2>
                        <h5>Makmur Babakan</h5>
                    </div>
                    <hr class="bg-gradient-secondary">
                </div>
            </div>
            <div class="col-1 text-center">
                <div class="vr" style="height: 100%; width: 3px; color:black;"></div>
            </div>
            <div class="col-8 ms-0">
                <div class="row">
                    <div class="col-12 text-end">
                        <h3>KWINTANSI</h3>
                        <tr>
                            <td>Waktu Tanggal</td>
                            <td> : </td>
                            <td><?= now(); ?></td>
                        </tr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>Bismillaahirrahmaanirrahiim</h4>
                    </div>
                </div>
                <hr class="bg-gradient-secondary">
                <div class="row">
                    <p class="font-weight-bold p-2 ps-0 pb-0">Dengan ini Saya,</p>
                    <table class="table table-sm">
                        <tr>
                            <td width="35%">Nama Warga</td>
                            <td width="5%">:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>RT</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </table>
                    <p class="font-weight-bold p-2 ps-0 pb-0">Menunaikan</p>
                    <div class="col-6">
                        <table class="table table-sm">
                            <tr>
                                <td width="35%">Zakat Fitri (Beras)</td>
                                <td width="5%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Zakat Fitri (Uang)</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table table-sm">
                            <tr>
                                <td width="35%">Zakat Maal (Uang)</td>
                                <td width="5%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Infaq</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr class="bg-gradient-secondary">
                <div class="row">
                    <div class="col-6 text-center">
                        <div class="row pb-7">
                            <p>Penerima,</p>
                        </div>
                        <div class="row">
                            <p>(................................)</p>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                    <div class="row pb-7">
                            <p>Penyetor,</p>
                        </div>
                        <div class="row">
                            <p>(................................)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>