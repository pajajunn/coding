<?php 
session_start();
if (isset($_SESSION['admin_email'])){
  //header("location:index.php");
}
include "koneksi.php";

$email    ="";
$password ="";
$err      ="";
if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email ==  '' or $password == ''){
        $err .="<li>Silahkan masukkan email dan password</li>";
    }
    if(empty($err)){
        $sql1 = "select * from admin where email ='$email'";
        $q1 = mysqli_query($conn, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($r1['password'] !=md5($password)) {
            $err .= "<li>Akun tidak di temukan</li>";
        }
    }
    if (empty($err)){
        $_SESSION['admin_email'] = $email;
        header("location:index.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RSKG</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

<style type="text/css" id="operaUserStyle"></style></head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/rss.webp" width="300">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        <?php
                                        if ($err){
                                            echo "<ul>$err</ul>";
                                        }
                                        ?>
                                    </div>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="email" value="<?php echo $email?>" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" name="login"  class="btn btn-primary btn-user btn-block">
                                            Login
                                    </button>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                    </from>
                                </div>
                            </div>
                        </div>
                    </div>
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



</body></html>