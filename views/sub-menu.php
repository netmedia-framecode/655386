<?php require_once("../controller/menu-management.php");
$_SESSION['project_spk_blt']['name_page'] = "Sub Menu";
require_once("../templates/views_top.php"); ?>

<div class="nxl-content">

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
    <div class="page-header-right ms-auto">
      <div class="page-header-right-items">
        <div class="d-flex d-md-none">
          <a href="javascript:void(0)" class="page-header-right-close-toggle">
            <i class="feather-arrow-left me-2"></i>
            <span>Back</span>
          </a>
        </div>
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
          <a href="add-sub-menu" class="btn btn-primary">
            <i class="feather-plus me-2"></i>
            <span>Tambah</span>
          </a>
        </div>
      </div>
      <div class="d-md-none d-flex align-items-center">
        <a href="javascript:void(0)" class="page-header-right-open-toggle">
          <i class="feather-align-right fs-20"></i>
        </a>
      </div>
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
                    <th class="text-center">Menu</th>
                    <th class="text-center">Sub Menu</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Url</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($views_sub_menu as $key => $data) {
                    $menu = strtolower(str_replace(' ', '-', $data['menu']));
                    $url = strtolower(str_replace(' ', '-', $data['url'])); ?>
                  <tr class="single-item">
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td><?= $data['menu'] ?></td>
                    <td><?= $data['title'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td><a href="<?= $url ?>"><?= $url ?></a></td>
                    <td>
                      <div class="hstack gap-2 justify-content-center">
                        <a href="edit-sub-menu?p=<?= $data['id_sub_menu']?>" class="btn btn-warning btn-sm">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="" method="post">
                          <input type="hidden" name="id_sub_menu" value="<?= $data['id_sub_menu'] ?>">
                          <input type="hidden" name="menu" value="<?= $menu ?>">
                          <input type="hidden" name="title" value="<?= $data['title'] ?>">
                          <button type="submit" name="delete_sub_menu" class="btn btn-danger btn-sm">
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

<?php require_once("../templates/views_bottom.php") ?>
