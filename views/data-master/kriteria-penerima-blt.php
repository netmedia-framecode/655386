<?php require_once("../../controller/data-master.php");
if (!isset($_GET["p"])) {
  header("Location: penerima-blt");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM penerima_blt WHERE id_penerima_blt = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_spk_blt"]["name_page"] = "Kriteria Penerima BLT";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content" style="height: 100vh;">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_spk_blt"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Penerima BLT</li>
          <li class="breadcrumb-item"><?= $_SESSION["project_spk_blt"]["name_page"] . ' ' . $view_data["nama_lengkap"]  ?></li>
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
                <div class="form-group mb-3">
                  <label>Nama Penerima</label>
                  <input class="form-control" value="<?= $view_data['nama_lengkap']; ?>" readonly>
                  <input type="hidden" name="id_penerima_blt" value="<?= $view_data['id_penerima_blt']; ?>">
                </div>
                <?php $countKriteria = mysqli_query($conn, "SELECT * FROM kriteria");
                if (mysqli_num_rows($countKriteria) > 0) {
                  while ($data = mysqli_fetch_assoc($countKriteria)) { ?>
                    <div class="form-group mb-3">
                      <label><?= $data['nama_kriteria'] ?></label>
                      <select name="data_sub[]" class="custom-select form-control" required>
                        <option value="">PILIH <?= $data['nama_kriteria'] ?></option>
                        <?php
                        $id_kriteria = $data['id_kriteria'];
                        $result = mysqli_query($conn, "SELECT * FROM sub_kriteria where id_kriteria='$id_kriteria'");
                        while ($data_sub = mysqli_fetch_assoc($result)) { ?>
                          <option value="<?= $data_sub['id_sub_kriteria'] ?>"><?= $data_sub['sub_kriteria']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                <?php }
                } ?>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="penerima-blt" class="btn btn-success">Kembali</a>
                  <button type="submit" name="add_alternatif" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->

  </div>

<?php }
require_once("../../templates/views_bottom.php") ?>