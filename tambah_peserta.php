<?php
session_start();
include 'koneksi.php';

$namapeserta = "";



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agenda Pertemuan</title>

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
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> Agenda Pertemuan </div>
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pertemuan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Pertemuan:</h6>
                        <a class="collapse-item" href="buttons.html">Pertemuan</a>
                        <a class="collapse-item" href="cards.html">Absensi</a>
                        <a class="collapse-item" href="cards.html">Report</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- profile info & task notification -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>


                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>


                    </ul>


                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Peserta</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Peserta
                            </button>
                            <div class="float-right">
                                <?php
                                $idp = $_GET['idp'];
                                $query = $conn->query("SELECT * FROM pertemuan WHERE idpertemuan = $idp");
                                $detail = $query->fetch_assoc();
                                ?>
                                Acara : <b><?php echo $detail['namapertemuan'] ?></b>
                            </div>
                            <br>


                            <!-- Modal  Tambah Peserta -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <div class="mb-3">
                                                    <label for="namapeserta" name="namapeserta" class="form-label">Nama Peserta</label>
                                                    <input type="text" class="form-control" name="namapeserta" id="namapeserta" required="required">
                                                </div>
                                                <input type="hidden" name="id_pertemuan" value="<?php echo $_GET['idp'] ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="simpan" value="add" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Peserta</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $nourut   = 1;
                                        $idp = $_GET['idp'];
                                        $select   = "SELECT * FROM peserta WHERE idpertemuan = $idp ";
                                        $sel   = mysqli_query($conn, $select);
                                        while ($hasil = mysqli_fetch_array($sel)) {
                                            $idpeserta         = $hasil['id'];
                                            $namapeserta       = $hasil['namapeserta'];

                                        ?>
                                            <tr>
                                                <td><?php echo $nourut++; ?></td>
                                                <td><?php echo $namapeserta ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $idpeserta; ?>"><i class="fas fa-pen fa-xs"></i>
                            </div></a></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $idpeserta; ?>">
                                <div class="icon"><i class="fa fa-trash"></i></div>
                            </button>


                            </td>
                            </tr>

                            <!-- edit modal input -->
                            <div class="modal fade" id="edit<?= $idpeserta ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Peserta</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <input type="hidden" name="id" value="<?= $idpeserta ?>">
                                                <div class="mb-3">
                                                    <label for="namapeserta" name="namapeserta" class="form-label">Nama Peserta</label>
                                                    <input type="text" class="form-control" name="namapeserta" id="namapeserta" value="<?= $namapeserta ?>" required="required">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete<?= $idpeserta ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST">
                                            <div class="modal-body">
                                                Apakah Anda Ingin Menghapus Data <b><?= $namapeserta ?></b> ?
                                                <div class="form-group">
                                                    <input type="hidden" name="idpeserta" value="<?php echo $idpeserta ?>">
                                                </div>
                                                <input type="hidden" name="idp" value="<?php echo $_GET['idp'] ?>">

                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?= $idpeserta ?>">
                                                    <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php
                                        }
                                        // fungsi untuk update edit peserta
                                        if (isset($_POST["update"])) {
                                            $idnya = $_POST['id'];
                                            $namapesertabaru = $_POST['namapeserta'];
                                            $updatedata = mysqli_query($conn, "UPDATE peserta SET `namapeserta`='$namapesertabaru' WHERE `id`='$idnya'");
                                            if ($updatedata) {
                                                echo " <div class='alert alert-success' align='center'>
        Nama Peserta Berhasil diubah.
        </div>
        <meta http-equiv='refresh' content='1; url= tambah_peserta.php?idp=$idp'/>  ";
                                            } else {
                                                echo "<div class='alert alert-warning' align='center'>
        Nama Peserta gagal diubah.
        </div>
        <meta http-equiv='refresh' content='1; url= tambah peserta.php'/> ";
                                            }
                                        };


                                        if (isset($_POST["hapus"])) { // untuk hapus data peserta
                                            $id         = $_POST['id'];

                                            $sql1       = "DELETE FROM peserta WHERE `id`='$id'";
                                            $qd         = mysqli_query($conn, $sql1);
                                            if ($qd) {
                                                echo " <div class='alert alert-success' align='center'>
        Nama Peserta Berhasil Dihapus.
        </div>
        <meta http-equiv='refresh' content='1; url= tambah_peserta.php?idp=$idp'/>  ";
                                            } else {
                                                echo "<div class='alert alert-warning' align='center'>
        Nama Peserta gagal diubah.
        </div>
        <meta http-equiv='refresh' content='1; url= tambah peserta.php'/> ";
                                            }
                                        }

                                        if (isset($_POST['simpan'])) // untuk menambahkan data peserta
                                        {
                                            //untuk menangkap data dari form 
                                            $namapeserta  = $_POST['namapeserta'];
                                            $id_pertemuan = $_POST['id_pertemuan'];
                                            // untuk memasukan data ke database
                                            $query = "INSERT INTO peserta (id, namapeserta, idpertemuan) VALUES ('','$namapeserta', '$id_pertemuan')";

                                            $hasil = mysqli_query($conn, $query);

                                            if ($hasil) {
                                                echo " <div class='alert alert-success' align='center'>
        Nama Peserta Berhasil Ditambahkan.
        </div>
        <meta http-equiv='refresh' content='1; url= tambah_peserta.php?idp=$id_pertemuan'/>  ";
                                            } else {
                                                echo "<div class='alert alert-warning' align='center'>
        Nama Peserta gagal diubah.
        </div>
        <meta http-equiv='refresh' content='1; url= tambah peserta.php'/> ";
                                            }
                                        }



                        ?>

                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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