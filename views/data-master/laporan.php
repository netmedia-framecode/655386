<?php require_once("../../controller/data-master.php");
$_SESSION["project_spk_blt"]["name_page"] = "Laporan";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 100vh;">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_spk_blt"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Laporan</li>
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
            <h5 class="card-title">Laporan Perhitungan Penerima BLT</h5>
            <p class="card-text">Anda dapat mencetak atau mengunduh data penerima BLT desa Merbaun yang telah dihitung dengan menggunakan Metode <strong>Simple Additive Weighting (SAW)</strong>. Silahkan anda klik tombol <strong>Cetak</strong> di bawah ini untuk mencetak atau mengunduh.</p>
            <div class="col rounded w-25 p-3 shadow">
              <h1><i class="bi bi-person-check-fill me-2 fa-1x"></i> <?= mysqli_num_rows($cetak) ?></h1>
              <span class="font-weight-bold">
                <h6>Penerima BLT</h6>
              </span>
            </div>
            <a href="cetak" class="btn btn-primary mt-4 w-25 shadow"><i class="bi bi-printer me-2"></i> Cetak</a>
          </div>
          <div class="col-lg-6 justify-content-end d-flex align-items-end">
            <img src="../../assets/img/3d-icon-product-management.png" style="width: 300px;" alt="">
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['p'])) { ?>
      <div class="card rounded-0">
        <div class="card-body">
          <?php

          require_once __DIR__ . '/../../assets/vendor/autoload.php';
          
          $mpdf = new \Mpdf\Mpdf();
          $mpdf->SetTitle("Laporan Penerima BLT Desa Merbaun");
          $mpdf->WriteHTML('
            <div style="border-bottom: 3px solid black;width: 100%;">
              <table border="0" style="width: 100%;">
                <tbody>
                  <tr>
                    <th style="text-align: center;">
                      <img src="../../assets/img/logo-kiri.png" alt="" style="width: 80px;height: 80px;">
                    </th>
                    <td style="text-align: center;">
                      <h3>PEMERINTAH KABUPATEN KUPANG<br>KECAMATAN AMARASI BARAT<br>DESA MERBAUN</h3>
                      <p style="font-size: 14px;">Jl. Pantai Selatan, Desa Merbaun, Kec. Amarasi Barat, Kabupaten Kupang, Nusa Tenggara Timur</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <h4 style="margin-top: 50px;text-align: center;margin-bottom: -20px;">Laporan Penerima BLT</h4>
            <div style="width: 210px;border-bottom: 1px solid black;margin: auto;"></div>
            
            <table border="0" style="width: 100%;margin-top: 20px;vertical-align: top;">
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Nama Penerima BLT</th>
                  <th>Penghasilan</th>
                  <th>Pekerjaan</th>
                  <th>Tanggungan</th>
                  <th>Luas Tanah</th>
                  <th>Umur</th>
                  <th>Nilai Penerima</th>
                </tr>
              </thead>
            <tbody>
          ');
          if (mysqli_num_rows($cetak) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($cetak)) {
              $mpdf->WriteHTML('
                <tr>
                  <th>' . $no++ . '</th>
                  <th>' . $row['nama_lengkap'] . '</th>
                  <th>' . $row['penghasilan'] . '</th>
                  <th>' . $row['pekerjaan'] . '</th>
                  <th>' . $row['tanggungan'] . '</th>
                  <th>' . $row['luas_tanah'] . '</th>
                  <th>' . $row['umur'] . '</th>
                  <th>' . $row['nilai_total'] . '</th>
                </tr>
              ');
            }
          }
          $mpdf->WriteHTML('
              </tbody>
            </table>
          ');
          $mpdf->Output();

          ?>
        </div>
      </div>
    <?php } ?>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>