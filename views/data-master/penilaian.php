<?php require_once("../../controller/data-master.php");
$_SESSION["project_spk_blt"]["name_page"] = "Penilaian";
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
        <li class="breadcrumb-item"><?= $_SESSION["project_spk_blt"]["name_page"] ?></li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card stretch stretch-full">
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nama Penerima BLT</th>
                    <?php foreach ($view_kriteria as $data) { ?>
                      <th class="text-center"><?= $data['nama_kriteria'] ?></th>
                    <?php } ?>
                    <th class="text-center">Aksi</th>
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
                      <td>
                        <div class="hstack gap-2 justify-content-center">
                          <a href="edit-penilaian?p=<?= $data['id_alternatif'] ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <form action="" method="post">
                            <input type="hidden" name="id_alternatif" value="<?= $data['id_alternatif'] ?>">
                            <input type="hidden" name="id_penerima_blt" value="<?= $data['id_penerima_blt'] ?>">
                            <input type="hidden" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>">
                            <button type="submit" name="delete_alternatif" class="btn btn-danger btn-sm">
                              <i class="bi bi-trash"></i>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>