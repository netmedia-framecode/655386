<nav class="nxl-navigation">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="./" class="b-brand">
        <!-- ========   change your logo hear   ============ -->
        <h4 class="logo logo-lg"><?= $data_utilities['name_web']?></h4>
        <img src="<?= $baseURL?>assets/img/<?= $data_utilities['logo']?>" alt="" class="logo logo-sm" />
      </a>
    </div>
    <div class="navbar-content">
      <ul class="nxl-navbar">
        <li class="nxl-item nxl-caption">
          <label>Navigation</label>
        </li>
        <li class="nxl-item nxl-hasmenu">
          <a href="<?= $baseURL?>views/" class="nxl-link">
            <span class="nxl-micon"><i class="feather-airplay"></i></span>
            <span class="nxl-mtext">Dashboards</span>
          </a>
        </li>
        <li class="nxl-item nxl-hasmenu">
          <a href="javascript:void(0);" class="nxl-link">
            <span class="nxl-micon"><i class="bi bi-database"></i></span>
            <span class="nxl-mtext">Data Master</span><span class="nxl-arrow"><i
                class="feather-chevron-right"></i></span>
          </a>
          <ul class="nxl-submenu">
            <li class="nxl-item"><a class="nxl-link" href="<?= $baseURL?>views/data-master/kriteria">Kriteria</a></li>
            <li class="nxl-item"><a class="nxl-link" href="<?= $baseURL?>views/data-master/sub-kriteria">Sub Kriteria</a></li>
            <li class="nxl-item"><a class="nxl-link" href="<?= $baseURL?>views/data-master/penerima-blt">Penerima BLT</a></li>
            <li class="nxl-item"><a class="nxl-link" href="<?= $baseURL?>views/data-master/penilaian">Penilaian</a></li>
            <li class="nxl-item"><a class="nxl-link" href="<?= $baseURL?>views/data-master/perhitungan">Perhitungan</a></li>
            <li class="nxl-item"><a class="nxl-link" href="<?= $baseURL?>views/data-master/laporan">Laporan</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>