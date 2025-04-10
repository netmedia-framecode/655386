<?php require_once("../../controller/data-master.php");
if (!isset($_GET["p"])) {
  header("Location: penilaian");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT alternatif.*, penerima_blt.nama_lengkap FROM alternatif JOIN penerima_blt ON alternatif.id_penerima_blt = penerima_blt.id_penerima_blt WHERE alternatif.id_alternatif = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_spk_blt"]["name_page"] = "Ubah Penilaian";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content" style="height: 100vh;">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_spk_blt"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Penilaian</li>
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
                <input type="hidden" name="id_alternatif" value="<?= $view_data['id_alternatif'] ?>">
                <input type="hidden" name="id_penerima_blt" value="<?= $view_data['id_penerima_blt'] ?>">
                <div class="form-group mb-3">
                  <label>Nama Penerima</label>
                  <input name="nama_lengkap" class="form-control" value="<?= $view_data['nama_lengkap']; ?>" readonly>
                  <input type="hidden" name="id_penerima_blt" value="<?= $view_data['id_penerima_blt']; ?>">
                </div>
                <div class="mb-3">
                  <label for="penghasilan" class="form-label">Penghasilan</label>
                  <select class="custom-select form-control" name="penghasilan">
                    <option value="<?= $view_data['penghasilan'] ?>"><?= $view_data['penghasilan'] ?></option>
                    <?php $penghasilan = $view_data['penghasilan'];
                    $query1 = "SELECT * FROM sub_kriteria WHERE id_kriteria='2' AND sub_kriteria!='$penghasilan'";
                    $penghasilan = mysqli_query($conn, $query1);
                    while ($data_sub1 = mysqli_fetch_assoc($penghasilan)) { ?>
                      <option value="<?= $data_sub1['sub_kriteria'] ?>"><?= $data_sub1['sub_kriteria']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="pekerjaan" class="form-label">Pekerjaan</label>
                  <select class="custom-select form-control" name="pekerjaan">
                    <option value="<?= $view_data['pekerjaan'] ?>"><?= $view_data['pekerjaan'] ?></option>
                    <?php $pekerjaan = $view_data['pekerjaan'];
                    $query2 = "SELECT * FROM sub_kriteria WHERE id_kriteria='3' AND sub_kriteria!='$pekerjaan'";
                    $pekerjaan = mysqli_query($conn, $query2);
                    while ($data_sub2 = mysqli_fetch_assoc($pekerjaan)) { ?>
                      <option value="<?= $data_sub2['sub_kriteria'] ?>"><?= $data_sub2['sub_kriteria']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="tanggungan" class="form-label">Tanggungan</label>
                  <select class="custom-select form-control" name="tanggungan">
                    <option value="<?= $view_data['tanggungan'] ?>"><?= $view_data['tanggungan'] ?></option>
                    <?php $tanggungan = $view_data['tanggungan'];
                    $query3 = "SELECT * FROM sub_kriteria WHERE id_kriteria='4' AND sub_kriteria!='$tanggungan'";
                    $tanggungan = mysqli_query($conn, $query3);
                    while ($data_sub3 = mysqli_fetch_assoc($tanggungan)) { ?>
                      <option value="<?= $data_sub3['sub_kriteria'] ?>"><?= $data_sub3['sub_kriteria']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="luas_tanah" class="form-label">Luas Tanah</label>
                  <select class="custom-select form-control" name="luas_tanah">
                    <option value="<?= $view_data['luas_tanah'] ?>"><?= $view_data['luas_tanah'] ?></option>
                    <?php $luas_tanah = $view_data['luas_tanah'];
                    $query4 = "SELECT * FROM sub_kriteria WHERE id_kriteria='5' AND sub_kriteria!='$luas_tanah'";
                    $luas_tanah = mysqli_query($conn, $query4);
                    while ($data_sub4 = mysqli_fetch_assoc($luas_tanah)) { ?>
                      <option value="<?= $data_sub4['sub_kriteria'] ?>"><?= $data_sub4['sub_kriteria']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="umur" class="form-label">Umur</label>
                  <select class="custom-select form-control" name="umur">
                    <option value="<?= $view_data['umur'] ?>"><?= $view_data['umur'] ?></option>
                    <?php $umur = $view_data['umur'];
                    $query5 = "SELECT * FROM sub_kriteria WHERE id_kriteria='6' AND sub_kriteria!='$umur'";
                    $umur = mysqli_query($conn, $query5);
                    while ($data_sub5 = mysqli_fetch_assoc($umur)) { ?>
                      <option value="<?= $data_sub5['sub_kriteria'] ?>"><?= $data_sub5['sub_kriteria']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="penilaian" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_alternatif" class="btn btn-warning">Ubah</button>
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