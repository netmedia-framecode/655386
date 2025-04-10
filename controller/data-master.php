<?php

require_once("../../config/Base.php");
require_once("../../config/Auth.php");
require_once("../../config/Alert.php");
require_once("../../views/data-master/redirect.php");

$atribut = ['Benefit', 'Cost'];

$kriteria = "SELECT * FROM kriteria ORDER BY id_kriteria DESC";
$view_kriteria = mysqli_query($conn, $kriteria);
if (isset($_POST["add_kriteria"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (kriteria($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Kriteria baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kriteria");
    exit();
  }
}
if (isset($_POST["edit_kriteria"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (kriteria($conn, $validated_post, $action = 'update') > 0) {
    $message = "Kriteria " . $_POST['nama_kriteriaOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kriteria");
    exit();
  }
}
if (isset($_POST["delete_kriteria"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (kriteria($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Kriteria " . $_POST['nama_kriteria'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: kriteria");
    exit();
  }
}

$sub_kriteria = "SELECT sub_kriteria.*, kriteria.kode_kriteria, kriteria.nama_kriteria FROM sub_kriteria JOIN kriteria ON sub_kriteria.id_kriteria = kriteria.id_kriteria ORDER BY id_sub_kriteria DESC";
$view_sub_kriteria = mysqli_query($conn, $sub_kriteria);
if (isset($_POST["add_sub_kriteria"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (sub_kriteria($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Sub Kriteria baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: sub-kriteria");
    exit();
  }
}
if (isset($_POST["edit_sub_kriteria"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (sub_kriteria($conn, $validated_post, $action = 'update') > 0) {
    $message = "Sub Kriteria " . $_POST['nama_kriteria'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: sub-kriteria");
    exit();
  }
}
if (isset($_POST["delete_sub_kriteria"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (sub_kriteria($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Sub Kriteria " . $_POST['nama_kriteria'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: sub-kriteria");
    exit();
  }
}

$penerima_blt = "SELECT * FROM penerima_blt ORDER BY id_penerima_blt DESC";
$view_penerima_blt = mysqli_query($conn, $penerima_blt);
if (isset($_POST["add_penerima_blt"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (penerima_blt($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Penerima BLT baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: penerima-blt");
    exit();
  }
}
if (isset($_POST["edit_penerima_blt"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (penerima_blt($conn, $validated_post, $action = 'update') > 0) {
    $message = "Penerima BLT " . $_POST['nama_lengkap'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: penerima-blt");
    exit();
  }
}
if (isset($_POST["delete_penerima_blt"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (penerima_blt($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Penerima BLT " . $_POST['nama_lengkap'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: penerima-blt");
    exit();
  }
}

$alternatif = "SELECT alternatif.*, penerima_blt.nama_lengkap FROM alternatif JOIN penerima_blt ON alternatif.id_penerima_blt = penerima_blt.id_penerima_blt ORDER BY alternatif.id_alternatif DESC";
$view_alternatif = mysqli_query($conn, $alternatif);
if (isset($_POST["add_alternatif"])) {
  if (alternatif($conn, $_POST, $action = 'insert') > 0) {
    $message = "Alternatif baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: penerima-blt");
    exit();
  }
}
if (isset($_POST["edit_alternatif"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (alternatif($conn, $validated_post, $action = 'update') > 0) {
    $message = "Alternatif " . $_POST['nama_lengkap'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: penilaian");
    exit();
  }
}
if (isset($_POST["delete_alternatif"])) {
  $validated_post = validate_post_data($conn, $_POST);
  if (alternatif($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Alternatif " . $_POST['nama_lengkap'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: penilaian");
    exit();
  }
}

$cetak = mysqli_query($conn, "SELECT * FROM alternatif JOIN penerima_blt ON alternatif.id_penerima_blt=penerima_blt.id_penerima_blt JOIN tabel_hasil ON alternatif.id_penerima_blt=tabel_hasil.id_alternatif ORDER BY nilai_total DESC");