<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$select_profile = "SELECT * FROM users WHERE id_user='$id_user'";
$view_profile = mysqli_query($conn, $select_profile);
if (isset($_POST["edit_profil"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (profil($conn, $validated_post, $action = 'update', $id_user) > 0) {
    $message = "Profil Anda berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: profil");
    exit();
  }
}

if (isset($_POST["setting"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (setting($conn, $validated_post, $action = 'update') > 0) {
    $message = "Setting pada system login berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: setting");
    exit();
  }
}
