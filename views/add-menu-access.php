<?php require_once("../controller/menu-management.php");
$_SESSION["project_spk_blt"]["name_page"] = "Tambah Akses Menu";
require_once("../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 100vh;">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION['project_spk_blt']['name_page'] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Menu Management</li>
        <li class="breadcrumb-item"><?= $_SESSION['project_spk_blt']['name_page'] ?></li>
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
                <label for="id_role" class="form-label">Role</label>
                <select name="id_role" class="form-control" id="id_role" required>
                  <option value="" selected>Pilih Role</option>
                  <?php foreach ($views_user_role as $data_select_role) { ?>
                  <option value="<?= $data_select_role['id_role'] ?>"><?= $data_select_role['role'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="id_menu" class="form-label">Menu</label>
                <select name="id_menu" class="form-control" id="id_menu" required>
                  <option value="" selected>Pilih Menu</option>
                  <?php foreach ($views_menu_check as $data_select_menu) { ?>
                  <option value="<?= $data_select_menu['id_menu'] ?>"><?= $data_select_menu['menu'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="menu-access" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_menu_access" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../templates/views_bottom.php") ?>
