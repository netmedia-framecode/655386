<?php require_once("../controller/dashboard.php");
$_SESSION["project_spk_blt"]["name_page"] = "";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->

<div class="nxl-content" style="height: 110vh;">
  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10">Dashboard</h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->
  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-gray-200">
                  <i class="bi bi-list-task"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark"><?= mysqli_num_rows($view_kriteria) ?></div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Kriteria</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-gray-200">
                  <i class="bi bi-list-task"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark"><?= mysqli_num_rows($view_sub_kriteria) ?></div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Sub Kriteria</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-gray-200">
                  <i class="bi bi-person-exclamation"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark"><?= mysqli_num_rows($view_penerima_blt) ?></div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Penerima BLT</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-gray-200">
                  <i class="bi bi-bar-chart-steps"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark"><?= mysqli_num_rows($view_alternatif) ?></div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Penilaian</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-12">
        <div class="card stretch stretch-full">
          <div class="card-header">
            <h5 class="card-title">Laporan Penerima BLT</h5>
            <div class="card-header-action">
              <div class="card-header-btn">
                <div data-bs-toggle="tooltip" title="Delete">
                  <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                </div>
                <div data-bs-toggle="tooltip" title="Refresh">
                  <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                </div>
                <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                  <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                </div>
              </div>
              <div class="dropdown">
                <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                  data-bs-offset="25, 25">
                  <div data-bs-toggle="tooltip" title="Options">
                    <i class="feather-more-vertical"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="data-master/penerima-blt.php" class="dropdown-item"><i class="bi bi-person-exclamation"></i>Penerima BLT</a>
                  <a href="data-master/penilaian.php" class="dropdown-item"><i class="bi bi-bar-chart-steps"></i>Penilaian</a>
                  <a href="data-master/perhitungan.php" class="dropdown-item"><i class="feather-bell"></i>Perhitungan</a>
                  <a href="data-master/laporan.php" class="dropdown-item"><i class="feather-trash-2"></i>Laporan</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body custom-card-action">
            <div class="table-responsive">
              <table class="table table-hover text-center mb-0" id="dataTable">
                <thead>
                  <tr class="border-b">
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
                  <?php if (mysqli_num_rows($cetak) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($cetak)) { ?>
                      <tr>
                        <th><?= $no++ ?></th>
                        <th><?= $row['nama_lengkap'] ?></th>
                        <th><?= $row['penghasilan'] ?></th>
                        <th><?= $row['pekerjaan'] ?></th>
                        <th><?= $row['tanggungan'] ?></th>
                        <th><?= $row['luas_tanah'] ?></th>
                        <th><?= $row['umur'] ?> tahun</th>
                        <th><?= $row['nilai_total'] ?></th>
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
  <!-- [ Main Content ] end -->
</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>