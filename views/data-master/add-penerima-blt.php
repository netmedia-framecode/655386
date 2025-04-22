<?php require_once("../../controller/data-master.php");
$_SESSION["project_spk_blt"]["name_page"] = "Tambah Penerima BLT";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_spk_blt"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Penerima BLT</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_spk_blt"]["name_page"] ?></li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?php if (isset($_POST['nama_lengkap'])) {
                                                                echo $_POST['nama_lengkap'];
                                                              } ?>" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" required>
              </div>
              <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" name="nik" value="<?php if (isset($_POST['nik'])) {
                                                          echo $_POST['nik'];
                                                        } ?>" class="form-control" id="nik" placeholder="NIK" required>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" value="<?php if (isset($_POST['alamat'])) {
                                                          echo $_POST['alamat'];
                                                        } ?>" class="form-control" id="alamat" placeholder="Alamat" required>
              </div>
              <div class="mb-3">
                <label for="rt_rw" class="form-label">RT / RW</label>
                <input type="text" name="rt_rw" value="<?php if (isset($_POST['rt_rw'])) {
                                                          echo $_POST['rt_rw'];
                                                        } ?>" class="form-control" id="rt_rw" placeholder="RT / RW" required>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="penerima-blt" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_penerima_blt" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>