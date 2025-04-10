<?php require_once("../../controller/data-master.php");
if (!isset($_GET["p"])) {
  header("Location: sub-kriteria");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT sub_kriteria.*, kriteria.kode_kriteria, kriteria.nama_kriteria FROM sub_kriteria JOIN kriteria ON sub_kriteria.id_kriteria = kriteria.id_kriteria WHERE sub_kriteria.id_sub_kriteria = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_spk_blt"]["name_page"] = "Ubah Sub Kriteria";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content" style="height: 100vh;">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_spk_blt"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Sub Kriteria</li>
          <li class="breadcrumb-item"><?= $_SESSION["project_spk_blt"]["name_page"] . ' ' . $view_data["nama_kriteria"]  ?></li>
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
                <input type="hidden" name="id_sub_kriteria" value="<?= $view_data['id_sub_kriteria'] ?>">
                <input type="hidden" name="nama_kriteria" value="<?= $view_data['nama_kriteria'] ?>">
                <div class="mb-3">
                  <label for="id_kriteria" class="form-label">Nama Kriteria</label>
                  <select name="id_kriteria" class="form-select" aria-label="Default select example" required>
                    <option selected value="<?= $view_data['id_kriteria'] ?>"><?= $view_data['nama_kriteria'] ?></option>
                    <?php $id_kriteria = $view_data['id_kriteria'];
                    $takeKriteria = mysqli_query($conn, "SELECT * FROM kriteria WHERE id_kriteria!='$id_kriteria'");
                    foreach ($takeKriteria as $data_k) : ?>
                      <option value="<?= $data_k['id_kriteria'] ?>"><?= $data_k['nama_kriteria'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="sub_kriteria" class="form-label">Sub Kriteria</label>
                  <input type="text" name="sub_kriteria" value="<?php if (isset($_POST['sub_kriteria'])) {
                                                                  echo $_POST['sub_kriteria'];
                                                                } else {
                                                                  echo $view_data['sub_kriteria'];
                                                                } ?>" class="form-control" id="sub_kriteria" placeholder="Sub Kriteria" required>
                </div>
                <div class="mb-3">
                  <label for="nilai_sub" class="form-label">Nilai Sub <span class="nilaiSub<?= $view_data['id_sub_kriteria'] ?>"><?= $view_data['nilai_sub'] ?></span></label><br>
                  <input type="range" name="nilai_sub" value="<?php if (isset($_POST['nilai_sub'])) {
                                                                echo $_POST['nilai_sub'];
                                                              } else {
                                                                echo $view_data['nilai_sub'];
                                                              } ?>" class="form-range" id="mySlider<?= $view_data['id_sub_kriteria'] ?>" placeholder="Bobot" min="0" max="100" step="10" required>
                  <script>
                    const slider<?= $view_data['id_sub_kriteria'] ?> = document.getElementById("mySlider<?= $view_data['id_sub_kriteria'] ?>");
                    const output<?= $view_data['id_sub_kriteria'] ?> = document.querySelector(".nilaiSub<?= $view_data['id_sub_kriteria'] ?>");
                    output<?= $view_data['id_sub_kriteria'] ?>.innerHTML = slider<?= $view_data['id_sub_kriteria'] ?>.value;

                    slider<?= $view_data['id_sub_kriteria'] ?>.oninput = function() {
                      output<?= $view_data['id_sub_kriteria'] ?>.innerHTML = this.value;
                    }
                  </script>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="sub-kriteria" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_sub_kriteria" class="btn btn-warning">Ubah</button>
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