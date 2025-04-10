<?php require_once("../../controller/data-master.php");
if (!isset($_GET["p"])) {
  header("Location: kriteria");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM kriteria WHERE id_kriteria= '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_spk_blt"]["name_page"] = "Ubah Kriteria";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content" style="height: 100vh;">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_spk_blt"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Kriteria</li>
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
                <input type="hidden" name="id_kriteria" value="<?= $view_data['id_kriteria'] ?>">
                <input type="hidden" name="nama_kriteriaOld" value="<?= $view_data['nama_kriteria'] ?>">
                <div class="mb-3">
                  <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                  <input type="text" name="nama_kriteria" value="<?php if (isset($_POST['nama_kriteria'])) {
                                                                    echo $_POST['nama_kriteria'];
                                                                  } else {
                                                                    echo $view_data['nama_kriteria'];
                                                                  } ?>" class="form-control" id="nama_kriteria" placeholder="Nama Kriteria" required>
                </div>
                <div class="mb-3">
                  <label for="atribut" class="form-label">Atribut</label>
                  <select name="atribut" class="form-select" aria-label="Default select example" required>
                    <option selected value="">Pilih Atribut</option>
                    <?php $view_atribut = $view_data['atribut'];
                    foreach ($atribut as $data_atribut) {
                      $selected = ($data_atribut == $view_atribut) ? 'selected' : ''; ?>
                      <option value="<?= $data_atribut ?>" <?= $selected ?>><?= $data_atribut ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="bobot" class="form-label">Bobot <span class="nilaiBobot">0</span></label>
                  <input type="range" name="bobot" value="<?php if (isset($_POST['bobot'])) {
                                                            echo $_POST['bobot'];
                                                          } else {
                                                            echo $view_data['bobot'];
                                                          } ?>" class="form-range" id="mySlider" placeholder="Bobot" min="0" max="100" step="5" required>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="kriteria" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_kriteria" class="btn btn-warning">Ubah</button>
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
<script>
  const slider = document.getElementById("mySlider");
  const output = document.querySelector(".nilaiBobot");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  }
</script>