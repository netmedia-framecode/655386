<?php

require_once("config/Base.php");
require_once("config/Alert.php");

$cetak = mysqli_query($conn, "SELECT * FROM alternatif JOIN penerima_blt ON alternatif.id_penerima_blt=penerima_blt.id_penerima_blt JOIN tabel_hasil ON alternatif.id_penerima_blt=tabel_hasil.id_alternatif ORDER BY nilai_total DESC");