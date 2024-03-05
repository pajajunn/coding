<?php
include "koneksi.php";
$id       = $_GET['id'];
$nama     ="";
$tgl_lahir="";
$no_telp  ="";
$alamat   ="";
$gender   ="";

if(isset($_POST['update'])){
    $nama      = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_telp   = $_POST['no_telp'];
    $alamat    = $_POST['alamat'];
    $gender    = $_POST['gender'];


   $sql = "UPDATE `pasien` SET `nama`='$nama',`tgl_lahir`='$tgl_lahir',`no_telp`='$no_telp',`alamat`='$alamat',`gender`='$gender' WHERE id=$id ";
   $result = mysqli_query($conn, $sql);
   if($result){
    header("location: pasien.php");
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RSKG</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="fontawesome-free/css/all.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

<style type="text/css" id="operaUserStyle"></style></head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                <img src="img/ginjal.webp" width="50"> 
                </div>
                <div class="sidebar-brand-text mx-3">RSKG ny.r.a.habibie </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">  
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
      
            <!-- pasien -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">  
                <a class="nav-link" href="pasien.php">
                <i class="fas fa-user fa-2x "></i>
                    <span>Data pasien</span></a>
            </li>

            <!-- dokter -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">  
                <a class="nav-link" href="dokter.php">
                <i class="fas fa-user-md fa-2x "></i>
                    <span>Data dokter</span></a>
            </li>

              <!-- logout -->
              <hr class="sidebar-divider my-0">
            <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
                 Logout
             </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

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
                <nav class="navbar navbar-expand navbar-light bg-tosca topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <style>
        .mx-auto {width: 800px;}
        .card {margin-top: 10px;}
    </style>
    <div class="mx-auto">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php
                    
                    $sql1      = "select * from pasien where id = '$id';";
                    $q1        = mysqli_query($conn, $sql1);
                    $data      = mysqli_fetch_array($q1);
                    $nama      = $data['nama'];
                    $tgl_lahir = $data['tgl_lahir'];
                    $no_telp   = $data['no_telp'];
                    $alamat    = $data['alamat'];
                    $gender    = $data['gender'];
                   
            
                ?>
                    <!-- Page Heading -->
                    <div class="card">
            <div class="card-header">
                 edit data
            </div>
        <div class="card-body">
            <form action="" method="POST">
            <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" id="nama" name="nama" value="<?php echo $nama?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal lahir</label>
                    <div class="col-sm-10">
                    <input type="date"  class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_telp" class="col-sm-2 col-form-label">No telephone</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" id="no_telp" name="no_telp" value="<?php echo $no_telp?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" id="alamat" name="alamat" value="<?php echo $alamat?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label">Jenis kelamin</label>
                    <div class="col-sm-10">
                       <select class="form-control" name="gender" id="gender">
                       <option value="">-pilih jenis kelamin-</option>
                       <option value="laki-laki" <?php if($gender == "laki-laki") echo "selected"?>>laki-laki</option>
                       <option value="perempuan" <?php if($gender == "perempuan") echo "selected"?>>perempuan</option>
                       </select>
                    </div>
                </div>
                <div class="col-12">
                   <input type="submit" name="update" value="Update" class="btn btn-success" />
                </div>
            </form>
        </div>
    </div>
</div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © RSKG ny.r.a.Habibie</span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>



 </body>
</html>