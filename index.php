<?php require_once("controller/visitor.php");
$_SESSION["project_spk_blt"]["name_page"] = "Beranda";
require_once("templates/top.php"); ?>

<!--Start rev slider wrapper-->
<section class="rev_slider_wrapper">
  <div id="slider1" class="rev_slider" data-version="5.0">
    <ul>
      <li data-transition="fade">
        <img src="assets/img/banner.jpg" alt="" width="1920" height="700" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

        <div style="margin-top: -600px; margin-left: 80px;">
          <div class="slide-content left-slide">
            <div class="title">Sistem Pendukung Keputusan Metode SAW</div>
            <div class="big-title text-white">DESA MERBAUN</div>
            <div class="big-title text-white">KECAMATAN AMARASI BARAT</div>
            <div class="big-title text-white">KABUPATEN KUPANG</div>
            <div class="text" style="width: 700px;">Penerimaan BLT desa Merbaun dengan menggunakan Metode <strong>Simple Additive Weighting (SAW)</strong> pada Kantor Desa Merbaun berbasis Web secara objektif dan terkomputerisasi.</div>
            <div class="btns-box">
              <a href="#tentang" class="thm-btn pdone">Lihat Lebih</a>&ensp;
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</section>
<!--End rev slider wrapper-->

<!--Start call to action area-->
<section class="callto-action-area sec-pd-one" id="tentang">
  <div class="container" style="margin-top: 200px;">
    <div class="row">
      <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
        <div class="callto-action-imgbox">
          <img src="assets/img/tentang.jpg" alt="Awesome Image">
        </div>
      </div>
      <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
        <div class="callto-action-text">
          <div class="title">
            <span>Tentang</span>
            <h1>SPK SAW & Desa Merbaun.</h1>
          </div>
          <div class="text-holder">
            <p style="color: #000;">Sistem Pendukung keputusan adalah sistem yang digunakan untuk mendukung keputusan pada masalah-masalah yang terstruktur maupun tidak terstruktur. Salah satu metode dalam sistem pendukung keputusan ialah metodeSimple Aditive Weighting (SAW). Penelitian ini bertujuan untuk membangun sebuah sistem pendukung keputusan penerima bantuan langsung tunai (BLT) pada Desa Merbaun.</p>
            <p style="color: #000;">Desa Merbaun merupakan desa yang terletak di Kecamatan Amarasi Barat, Kabupaten Kupang, Provinsi Nusa Tenggara Timur. Pada Desa Merbaun terdapat beberapa jenis bantuan seperti bantuan sembako APBD, BLT APBD, BLT Kemensos, dan BLT Dana desa. Setiap tiga bulan sekali Desa Merbaun mengadakan penerimaan Bantuan Langsung Tunai Dana Desa dengan nominal Rp. 900.000. Menurut Badan Pusat Statistik (BPS) Amarasi Barat pada tahun 2022 keluarga pada Desa Merbaun ialah sekitar 629 keluarga, data terakhir pembagian Bantuan Langsung Tunai Dana Desa ialah sebanyak 50 Keluarga, sedangkan batas jumlah penerima Bantuan Langsung Tunai disesuaikan dengan dana yang masuk ke kantor desa.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--End call to action area-->

<!--Start customer feedback -->
<section class="customer-feedback">
  <div class="container" id="informasi">
    <div class="sec-title text-center">
      <span class="color-2">Informasi</span>
      <div class="border center color-2"></div>
      <h1>Penerima BLT</h1>
    </div>
    <div class="row mb-5">
      <div class="col-md-12 col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-center mb-0" style="color: #000;" id="dataTable">
                <thead>
                  <tr>
                    <th style="text-align: center;">Rank</th>
                    <th style="text-align: center;">Nama Penerima BLT</th>
                    <th style="text-align: center;">Penghasilan</th>
                    <th style="text-align: center;">Pekerjaan</th>
                    <th style="text-align: center;">Tanggungan</th>
                    <th style="text-align: center;">Luas Tanah</th>
                    <th style="text-align: center;">Umur</th>
                    <th style="text-align: center;">Nilai Penerima</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (mysqli_num_rows($cetak) > 0) {
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($cetak)) { ?>
                      <tr>
                        <th style="text-align: center;"><?= $no++ ?></th>
                        <th><?= $data['nama_lengkap'] ?></th>
                        <th style="text-align: center;"><?= $data['penghasilan'] ?></th>
                        <th style="text-align: center;"><?= $data['pekerjaan'] ?></th>
                        <th style="text-align: center;"><?= $data['tanggungan'] ?></th>
                        <th><?= $data['luas_tanah'] ?></th>
                        <th style="text-align: center;"><?= $data['umur'] ?> tahun</th>
                        <th style="text-align: center;"><?= $data['nilai_total'] ?></th>
                      </tr>
                  <?php }
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--End customer feedback -->

<?php require_once("templates/bottom.php") ?>