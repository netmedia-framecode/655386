<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$kriteria = "SELECT * FROM kriteria";
$view_kriteria = mysqli_query($conn, $kriteria);

$sub_kriteria = "SELECT * FROM sub_kriteria";
$view_sub_kriteria = mysqli_query($conn, $sub_kriteria);

$penerima_blt = "SELECT * FROM penerima_blt";
$view_penerima_blt = mysqli_query($conn, $penerima_blt);

$alternatif = "SELECT * FROM alternatif";
$view_alternatif = mysqli_query($conn, $alternatif);

$cetak = mysqli_query($conn, "SELECT * FROM alternatif JOIN penerima_blt ON alternatif.id_penerima_blt=penerima_blt.id_penerima_blt JOIN tabel_hasil ON alternatif.id_penerima_blt=tabel_hasil.id_alternatif ORDER BY nilai_total DESC");
