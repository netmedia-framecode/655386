<?php require_once("../../controller/data-master.php");
$_SESSION["project_spk_blt"]["name_page"] = "Tambah Sub Kriteria";
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
                <label for="id_kriteria" class="form-label">Nama Kriteria</label>
                <select name="id_kriteria" class="form-select" aria-label="Default select example" required>
                  <option selected value="">Pilih Nama Kriteria</option>
                  <?php foreach ($view_kriteria as $data_k) : ?>
                    <option value="<?= $data_k['id_kriteria'] ?>"><?= $data_k['nama_kriteria'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="sub_kriteria" class="form-label">Sub Kriteria</label>
                <input type="text" name="sub_kriteria" value="<?php if (isset($_POST['sub_kriteria'])) {
                                                                echo $_POST['sub_kriteria'];
                                                              } ?>" class="form-control" id="sub_kriteria" placeholder="Sub Kriteria" required>
              </div>
              <div class="mb-3">
                <label for="nilai_sub" class="form-label">Nilai Sub <span class="nilaiSub">0</span></label>
                <input type="range" name="nilai_sub" value="<?php if (isset($_POST['nilai_sub'])) {
                                                              echo $_POST['nilai_sub'];
                                                            } else {
                                                              echo 0;
                                                            } ?>" class="form-range" id="mySlider" placeholder="Bobot" min="0" max="100" step="10" required>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="sub-kriteria" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_sub_kriteria" class="btn btn-primary">Tambah</button>
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
  const output = document.querySelector(".nilaiSub");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  }
</script>