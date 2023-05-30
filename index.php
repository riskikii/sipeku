<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sipeku</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIPEKU</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="?url=penyewaan">
          <i class="fas fa-plus"></i>
          <span>Penyewaan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?url=faktur">
          <i class="fas fa-file-invoice"></i>
          <span>SKRD dan Faktur</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-folder"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?url=lap_terperinci">Laporan Terperinci </a>
            <a class="collapse-item" href="?url=lap_peritem">Laporan Persub Item</a>
            <a class="collapse-item" href="?url=lap_keseluruhan">Laporan Keseluruhan</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"></h1>
          <?php
          include 'halaman.php'
          ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

       <!-- Start of Main Content -->
      <h1 class="h3 mb-4 text-gray-800 text-center">Dashboard</h1>
            <div class="row-inline">
                <div class="flex-container">
                    <div class="card mb-5" style="border-radius: 10px; width:30%; margin-left:360px; margin-bottom:20px;">
                    <div class="card-body " style="
                        box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                        border-radius:10px;">
                        <div class="row align-items-start">
                            <div class="col" style="width: 25%; margin-left:0px">
                                <img class="img" style="width:150%;" src="img/properti.png"/>

                            </div>
                            <div class="col text-gray-800" style="width:80%; margin-left:10px; margin-right:35px;margin-top:30px; line-height:2px;">
                                <h4 class="mt-1"><p >Rp.250.000</p></h4>
                                <p>Total Penyewaan</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    

                    <div class="container">
                    <div class="row align-items-start">

                    <div class="col">
                    <div class="card mb-4" style="border-radius: 5px; width:30%;  margin-left:10px;">
                    <div class="card-body" style="
                        box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;">
                        <div class="row align-items-start">
                        <div class="col" style="width: 10%; margin-left:2px">
                                <img class="img" style="width:160%; margin-top:20px;" src="img/laporanrinci.png"/>

                            </div>
                            <div class="col text-gray-800" style="width:90%; margin-left:10px; margin-right:30px;margin-top:10px;">
                                <h4 class="mt-2"><p >Rp.250.000</p></h4>
                                <p>Laporan Terperinci</p>
                            </div>
                        </div>
                    </div></div>

                    <div class="col">
                    <div class="card mb-5" style="border-radius: 10px; width:30%;  margin-left:340px;">
                    <div class="card-body" style="
                        box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;">
                        <div class="row align-items-start">
                        <div class="col" style="width: 25%; margin-left:0px">
                                <img class="img" style="width:100%; margin-left:5px; margin-top:20px;" src="img/laporansub.png"/>

                            </div>
                            <div class="col text-gray-800" style="width:100%; margin-left:10px; margin-right:30px;margin-top:10px;">
                                <h4 class="mt-2"><p >Rp.250.000</p></h4>
                                <p>Laporan Persubitem</p>
                            </div>
                        </div>
                    </div></div>

                    <div class="col">
                    <div class="card mb-5" style="border-radius: 10px; width:30%;  margin-left:340px;">
                    <div class="card-body" style="
                        box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;">
                        <div class="row align-items-start">
                        <div class="col" style="width: 25%; margin-left:0px">
                                <img class="img" style="width:150%; margin-top:20px;" src="img/laporanseluruh.png"/>

                            </div>
                            <div class="col text-gray-800" style="width:90%; margin-left:10px; margin-right:30px;margin-top:10px;">
                                <h4 class="mt-2"><p >Rp.250.000</p></h4>
                                <p>Laporan Keseluruhan</p>
                            </div>
                        </div>
                    </div></div>
</div>
</div>

                </div>
            </div>
    </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistem Informasi Pelaporan Keuangan DISPORA Sumbar Prov 2023</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
