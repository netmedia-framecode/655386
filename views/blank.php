<?php require_once("../controller/dashboard.php");
$_SESSION["project_spk_blt"]["name_page"] = "Blank";
require_once("../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 100vh;">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION['project_spk_blt']['name_page'] ?></h5>
      </div>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content"></div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../templates/views_bottom.php") ?>
