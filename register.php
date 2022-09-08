<?php
session_start();
require 'koneksi.php';

// cek login, terdaftar atau tidak
if (isset($_POST['register_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = $conn->query("SELECT username FROM login WHERE username = '$username' ");

    if (mysqli_fetch_assoc($result) > 0) {
        echo "<script>alert('Username Sudah Terdaftar');</script>";
        echo "<script>location='register.php';</script>";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = $conn->query("INSERT INTO login VALUES('', '$username', '$email', '$password')");

        if ($query != 0) {
            echo "<script>location='login.php';</script>";
        } else {
            echo "<script>location='register.php';</script>";
        }
    }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register Here!</h1>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                        echo '<h2 class="bg-danger text-white">' . $_SESSION['status'] . '</h2>';
                                        unset($_SESSION['status']);
                                    }
                                    ?>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
                                        <button type="submit" name="register_btn" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

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

</body>

</html>