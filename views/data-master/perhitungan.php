<?php require_once("../../controller/data-master.php");
$_SESSION["project_spk_blt"]["name_page"] = "Perhitungan";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 200vh;">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_spk_blt"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Perhitungan</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_spk_blt"]["name_page"] ?></li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="card rounded-0">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <h5 class="card-title">Perhitungan Penerima BLT</h5>
            <p class="card-text">Penerimaan BLT desa Merbaun dengan menggunakan Metode <strong>Simple Additive Weighting (SAW)</strong> pada Kantor Desa Merbaun berbasis Web secara objektif dan terkomputerisasi.</p>
            <div class="col rounded w-25 p-3 shadow">
              <h1><i class="bi bi-person-exclamation me-2 fa-1x"></i> <?= mysqli_num_rows($view_penerima_blt) ?></h1>
              <span class="font-weight-bold">
                <h6>Penerima BLT</h6>
              </span>
            </div>
            <a href="perhitungan?p=hitung&value=kriteria" class="btn btn-primary mt-4 w-25 shadow"><i class="bi bi-calculator me-2"></i> Mulai Hitung</a>
          </div>
          <div class="col-lg-6 justify-content-end d-flex align-items-end">
            <img src="../../assets/img/3d-woman-working-laptop.png" style="width: 280px;" alt="">
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['p'])) {
      if ($_GET['p'] == 'hitung') { ?>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link <?php if ($_GET['value'] == "kriteria") {
                                  echo "text-primary active";
                                } else {
                                  echo "text-dark";
                                } ?>" aria-current="page" href="perhitungan?p=hitung&value=kriteria">Kriteria</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($_GET['value'] == "alternatif") {
                                  echo "text-primary active";
                                } else {
                                  echo "text-dark";
                                } ?>" href="perhitungan?p=hitung&value=alternatif">Alternatif</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($_GET['value'] == "konversi") {
                                  echo "text-primary active";
                                } else {
                                  echo "text-dark";
                                } ?>" href="perhitungan?p=hitung&value=konversi">Konversi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($_GET['value'] == "normalisasi") {
                                  echo "text-primary active";
                                } else {
                                  echo "text-dark";
                                } ?>" href="perhitungan?p=hitung&value=normalisasi">Normalisasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($_GET['value'] == "nilai_total_alternatif") {
                                  echo "text-primary active";
                                } else {
                                  echo "text-dark";
                                } ?>" href="perhitungan?p=hitung&value=nilai_total_alternatif">Nilai Total Alternatif</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($_GET['value'] == "perangkingan") {
                                  echo "text-primary active";
                                } else {
                                  echo "text-dark";
                                } ?>" href="perhitungan?p=hitung&value=perangkingan">Perangkingan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($_GET['value'] == "") {
                                  echo "text-primary active";
                                } else {
                                  echo "text-dark";
                                } ?>" href="perhitungan"><i class="bi bi-arrow-clockwise"></i> Reset</a>
          </li>
        </ul>
        <div class="card border-0 rounded-0">
          <div class="card-body">
            <?php
            if ($_GET['value'] == "kriteria") { ?>
              <div class="table-responsive">
                <table class="table table-hover text-center" id="dataTable">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Kode Kriteria</th>
                      <th class="text-center">Nama Kriteria</th>
                      <th class="text-center">Atribut</th>
                      <th class="text-center">Bobot</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($view_kriteria as $key => $data) { ?>
                      <tr class="single-item">
                        <td class="text-center"><?= $key + 1 ?></td>
                        <td><?= $data['kode_kriteria'] ?></td>
                        <td><?= $data['nama_kriteria'] ?></td>
                        <td><?= $data['atribut'] ?></td>
                        <td><?= $data['bobot'] ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            <?php } else if ($_GET['value'] == "alternatif") { ?>
              <div class="table-responsive">
                <table class="table table-hover text-center" id="dataTable">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama Penerima BLT (Alternatif)</th>
                      <?php foreach ($view_kriteria as $data) { ?>
                        <th class="text-center"><?= $data['nama_kriteria'] ?></th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($view_alternatif as $key => $data) { ?>
                      <tr class="single-item">
                        <td class="text-center"><?= $key + 1 ?></td>
                        <td><?= $data['nama_lengkap'] ?></td>
                        <td><?= $data['umur'] ?></td>
                        <td><?= $data['luas_tanah'] ?></td>
                        <td><?= $data['tanggungan'] ?></td>
                        <td><?= $data['pekerjaan'] ?></td>
                        <td><?= $data['penghasilan'] ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            <?php } else if ($_GET['value'] == "konversi") {
              require_once("saw.php"); ?>
              <h6>Konversi Nilai ke Angka</h6>
              <div class="table-responsive">
                <table class="table table-hover text-center">
                  <tbody>
                    <?php foreach ($sample as $id_sample => $nilai) { ?>
                      <tr class="single-item">
                        <?php foreach ($nilai as $id_kriteria => $nilai_kriteria) { ?>
                          <td><?= $nilai_kriteria ?></td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            <?php } else if ($_GET['value'] == "normalisasi") {
              require_once("saw.php"); ?>
              <div class="table-responsive">
                <table class="table table-hover text-center" id="dataTable">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama Penerima BLT (Alternatif)</th>
                      <?php foreach ($kriteria as $id_kriteria => $data) { ?>
                        <th class="text-center"><?= $data['nama_kriteria'] ?></th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($normalisasi as $id_sample => $data) { ?>
                      <tr class="single-item">
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $alternatif[$id_sample]['nama_lengkap'] ?></td>
                        <?php foreach ($data as $id_kriteria => $nilai) { ?>
                          <td><?= round($nilai, 3) ?></td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            <?php } else if ($_GET['value'] == "nilai_total_alternatif") {
              require_once("saw.php"); ?>
              <div class="table-responsive">
                <table class="table table-hover text-center" id="dataTable">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama Penerima BLT</th>
                      <th class="text-center">Nilai Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($alternatif as $id_alternatif => $data_alternatif) { ?>
                      <tr class="single-item">
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $data_alternatif['nama_lengkap'] ?></td>
                        <td><?= $nilai_total[$id_alternatif] ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            <?php } else if ($_GET['value'] == "perangkingan") { ?>
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Perhitungan Selesai!</h4>
                <p>Perhitungan telah selesai dilakukan, silahkan lihat hasil perhitungan pada menu <span><a href="laporan"><strong>Laporan</strong></a></span></p>
                <hr>
                <p class="mb-0">Terima kasih telah menggunakan aplikasi ini untuk mendapat hasil Penerima BLT dengan metode SAW.</p>
              </div>
              <?php require_once("saw.php"); ?>
              <div class="table-responsive">
                <table class="table table-hover text-center" id="dataTable">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama Penerima BLT</th>
                      <th class="text-center">Nilai Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $ranking = 1;
                    foreach ($nilai_total as $id_alternatif => $total) { ?>
                      <tr class="single-item">
                        <td class="text-center"><?= $ranking++; ?></td>
                        <td><?= $alternatif[$id_alternatif]['nama_lengkap'] ?></td>
                        <td><?= $total ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            <?php } ?>
          </div>
        </div>
    <?php }
    } ?>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>