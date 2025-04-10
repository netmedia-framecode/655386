<?php require_once("../../controller/data-master.php");

$kriteria = array();
$query_kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
foreach ($query_kriteria as $row) {
  $kriteria[$row['id_kriteria']] = array(
    'kode_kriteria' => $row['kode_kriteria'],
    'nama_kriteria' => $row['nama_kriteria'],
    'atribut' => $row['atribut'],
    'bobot' => $row['bobot']
  );
}
$jml_kriteria = count($kriteria);

$alternatif = array();
$query_alternatif = mysqli_query($conn, "SELECT * FROM alternatif JOIN penerima_blt ON alternatif.id_penerima_blt = penerima_blt.id_penerima_blt ORDER BY alternatif.id_alternatif DESC");
foreach ($query_alternatif as $row) {
  $alternatif[$row['id_penerima_blt']] = array(
    'nama_lengkap' => $row['nama_lengkap'],
    'penghasilan' => $row['penghasilan'],
    'pekerjaan' => $row['pekerjaan'],
    'tanggungan' => $row['tanggungan'],
    'luas_tanah' => $row['luas_tanah'],
    'umur' => $row['umur']
  );
}
$jml_alternatif = count($alternatif);

$data_kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
$bobot_kriteria = array();
$type_kriteria = array();

foreach ($data_kriteria as $data) {
  $bobot_kriteria[$data['id_kriteria']] = $data['bobot'];
  $type_kriteria[$data['id_kriteria']] = $data['atribut'];
}

$data_nilai = mysqli_query($conn, "SELECT * FROM tabel_nilai ORDER BY id_penerima_blt,id_kriteria");

$sample = array();
foreach ($data_nilai as $data) {
  if (!isset($sample[$data['id_penerima_blt']])) {
    $sample[$data['id_penerima_blt']] = array();
  }
  $sample[$data['id_penerima_blt']][$data['id_kriteria']] = $data['nilai_sub'];
}

$max = array();
$min = array();
foreach ($kriteria as $id_kriteria => $value) {
  $max[$id_kriteria] = max(array_column($sample, $id_kriteria));
  $min[$id_kriteria] = min(array_column($sample, $id_kriteria));
}

$normalisasi = array();
foreach ($sample as $id_sample => $value) {
  foreach ($kriteria as $id_kriteria => $value) {
    // Lakukan normalisasi berdasarkan type kriteria
    if ($type_kriteria[$id_kriteria] == "Benefit") {
      // Normalisasi benefit (nilai tinggi lebih baik)
      $normalisasi[$id_sample][$id_kriteria] = $sample[$id_sample][$id_kriteria] / $max[$id_kriteria];
    } else {
      // Normalisasi cost (nilai rendah lebih baik)
      $normalisasi[$id_sample][$id_kriteria] = $min[$id_kriteria] / $sample[$id_sample][$id_kriteria];
    }
  }
}

$nilai_total = array();
foreach ($alternatif as $id_alternatif => $data_alternatif) {
  $nilai_total[$id_alternatif] = 0;
  foreach ($kriteria as $id_kriteria => $data_kriteria) {
    $nilai_total[$id_alternatif] += $normalisasi[$id_alternatif][$id_kriteria] * $data_kriteria['bobot'];
  }
}

arsort($nilai_total);

foreach ($nilai_total as $id_alternatif => $total) {
  $checkID_alternatif = mysqli_query($conn, "SELECT * FROM tabel_hasil WHERE id_alternatif='$id_alternatif'");
  if (mysqli_num_rows($checkID_alternatif) == 0) {
    mysqli_query($conn, "INSERT INTO tabel_hasil(id_alternatif,nilai_total) VALUES('$id_alternatif','$total')");
  } else if (mysqli_num_rows($checkID_alternatif) > 0) {
    mysqli_query($conn, "UPDATE tabel_hasil SET nilai_total='$total' WHERE id_alternatif='$id_alternatif'");
  }
}

foreach ($normalisasi as $id_alternatif => $nilai) {
  foreach ($nilai as $id_kriteria => $nilai_norm) {
    $checkID_alternatif = mysqli_query($conn, "SELECT * FROM tabel_normalisasi WHERE id_alternatif='$id_alternatif'");
    if (mysqli_num_rows($checkID_alternatif) == 0) {
      $result = mysqli_query($conn, "INSERT INTO tabel_normalisasi(id_alternatif,id_kriteria,nilai_normalisasi) VALUES('$id_alternatif','$id_kriteria','$nilai_norm')");
    }
  }
}
