<?php require_once("../../controller/data-master.php");
$_SESSION["project_spk_blt"]["name_page"] = "Tambah Kriteria";
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
                <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                <input type="text" name="nama_kriteria" value="<?php if (isset($_POST['nama_kriteria'])) {
                                                                  echo $_POST['nama_kriteria'];
                                                                } ?>" class="form-control" id="nama_kriteria" placeholder="Nama Kriteria" required>
              </div>
              <div class="mb-3">
                <label for="atribut" class="form-label">Atribut</label>
                <select name="atribut" class="form-select" aria-label="Default select example" required>
                  <option selected value="">Pilih Atribut</option>
                  <?php foreach ($atribut as $data_atribut) { ?>
                    <option value="<?= $data_atribut ?>"><?= $data_atribut ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="bobot" class="form-label">Bobot <span class="nilaiBobot">0</span></label>
                <input type="range" name="bobot" value="<?php if (isset($_POST['bobot'])) {
                                                          echo $_POST['bobot'];
                                                        } else {
                                                          echo 0;
                                                        } ?>" class="form-range" id="mySlider" placeholder="Bobot" min="0" max="100" step="5" required>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="kriteria" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_kriteria" class="btn btn-primary">Tambah</button>
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
<script>
  const slider = document.getElementById("mySlider");
  const output = document.querySelector(".nilaiBobot");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  }
</script>