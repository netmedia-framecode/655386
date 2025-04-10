<?php

$id_user = valid($conn, $_SESSION["project_spk_blt"]["users"]["id"]);
$id_role = valid($conn, $_SESSION["project_spk_blt"]["users"]["id_role"]);
$role = valid($conn, $_SESSION["project_spk_blt"]["users"]["role"]);
$email = valid($conn, $_SESSION["project_spk_blt"]["users"]["email"]);
$name = valid($conn, $_SESSION["project_spk_blt"]["users"]["name"]);
$image = valid($conn, $_SESSION["project_spk_blt"]["users"]["image"]);
