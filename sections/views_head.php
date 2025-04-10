<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="<?= $data_utilities['keyword']?>">
<meta name="description" content="<?= $data_utilities['description']?>">
<meta name="author" content="<?= $data_utilities['author']?>">
<link rel="icon" href="<?= $baseURL?>assets/img/<?= $data_utilities['logo']?>" type="image/png">
<title><?= $data_utilities['name_web']?> <?php if (isset($_SESSION['project_spk_blt']['name_page'])) {
                          if (!empty($_SESSION['project_spk_blt']['name_page'])) {
                            echo " - " . $_SESSION['project_spk_blt']['name_page'];
                          }
                        } ?>
</title>
<link href="<?= $baseURL ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/vendor/css/vendors.min.css" />
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/vendor/css/daterangepicker.min.css" />
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/vendor/css/dataTables.bs5.min.css">
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/css/theme.min.css" />
<link rel="stylesheet" type="text/css" href="<?= $baseURL ?>assets/vendor/datatables/dataTables.bootstrap4.min.css">
<script src="<?= $baseURL ?>assets/sweetalert/dist/sweetalert2.all.min.js"></script>
