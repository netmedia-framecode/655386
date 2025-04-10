<?php
if (!isset($_SESSION["project_spk_blt"]["users"])) {
  header("Location: ../auth/");
  exit;
}
