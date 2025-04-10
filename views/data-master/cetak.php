<?php require_once("../../controller/data-master.php");

require_once __DIR__ . '/../../assets/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetTitle("Laporan Penerima BLT Desa Merbaun");
$mpdf->WriteHTML('
<div style="border-bottom: 3px solid black;width: 100%;">
  <table border="0" style="width: 100%;">
    <tbody>
      <tr>
        <th style="text-align: center;">
          <img src="../../assets/img/logo-kiri.png" alt="" style="width: 80px;height: 80px;">
        </th>
        <td style="text-align: center;">
          <h3>PEMERINTAH KABUPATEN KUPANG<br>KECAMATAN AMARASI BARAT<br>DESA MERBAUN</h3>
          <p style="font-size: 14px;">Jl. Pantai Selatan, Desa Merbaun, Kec. Amarasi Barat, Kabupaten Kupang, Nusa Tenggara Timur</p>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<h4 style="margin-top: 50px;text-align: center;margin-bottom: -20px;">Laporan Penerima BLT</h4>
<div style="width: 210px;border-bottom: 1px solid black;margin: auto;"></div>

<table border="0" style="width: 100%;margin-top: 20px;vertical-align: top;">
  <thead>
    <tr>
      <th>Rank</th>
      <th>Nama Penerima BLT</th>
      <th>Penghasilan</th>
      <th>Pekerjaan</th>
      <th>Tanggungan</th>
      <th>Luas Tanah</th>
      <th>Umur</th>
      <th>Nilai Penerima</th>
    </tr>
  </thead>
<tbody>
');
if (mysqli_num_rows($cetak) > 0) {
  $no = 1;
  while ($row = mysqli_fetch_assoc($cetak)) {
    $mpdf->WriteHTML('
      <tr>
        <th>' . $no++ . '</th>
        <th>' . $row['nama_lengkap'] . '</th>
        <th>' . $row['penghasilan'] . '</th>
        <th>' . $row['pekerjaan'] . '</th>
        <th>' . $row['tanggungan'] . '</th>
        <th>' . $row['luas_tanah'] . '</th>
        <th>' . $row['umur'] . '</th>
        <th>' . $row['nilai_total'] . '</th>
      </tr>
    ');
  }
}
$mpdf->WriteHTML('
</tbody>
</table>
');
$mpdf->OutputHttpDownload('Laporan-Penerima-BLT-Desa-Merbaun' . date("Y-m-d") . '.pdf');
header("Location: laporan");
exit;
          // $mpdf->Output();