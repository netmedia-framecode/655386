<?php if (!isset($_SESSION)) {
  session_start();
}
require_once("../controller/auth.php");
if (isset($_SESSION["project_spk_blt"])) {
  unset($_SESSION["project_spk_blt"]);
  header("Location: ./");
  exit();
}
