<?php
session_start();
include 'koneksi.php';


if(isset($GET['idp'])){
    $idp = $_GET['idp'];
} else 
{
    if(isset($_SESSION['idp'])){
        header("location: index.php");
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

    <title>Agenda Pertemuan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
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
                    <div class="col-md-6 col-sm-4 clearfix">
                            <ul class="notification-area pull-right">
                                <li><h4><div class="date">
                                    <script type='text/javascript'>
                            
                                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                var date = new Date();
                                var day = date.getDate();
                                var month = date.getMonth();
                                var thisDay = date.getDay(),
                                    thisDay = myDays[thisDay];
                                var yy = date.getYear();
                                var year = (yy < 1000) ? yy + 1900 : yy;
                                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
                                </script></b></div></h4>

                            </li>
                            </ul>
                        </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
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
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                    <div class="row">
                        <!-- Membuat Pertemuan Baru  -->
                        <div class="col-xl-4 col-md-3 mb-10">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-8xl font-weight-bold text-primary text-uppercase mb-2">
                                                Pertemuan
                                            </div>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                                            Membuat Pertemuan
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="add">Membuat Pertemuan</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="index.php" method="POST">
                                                            <div class="mb-3">
                                                                <label for="namapertemuan" name="namapertemuan" class="form-label">Nama Pertemuan</label>
                                                                <input type="text" class="form-control" name="namapertemuan" id="namapertemuan"  required="required">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tanggal" name="tanggal" class="form-label">Tanggal Pertemuan</label>
                                                                <input type="datetime-local" class="form-control" name="tanggal"  id="tanggal"   required="required" >
                                                            </div>
                                                            <!-- <div class="mb-3">
                                                                <label for="waktu" class="form-label">Waktu</label>
                                                                <input type="time" name="waktu"  class="form-control" id="waktu"   required="required" >
                                                            </div> -->
                                                            <div class="mb-3">
                                                                <label for="lokasi" class="form-label">Lokasi Pertemuan</label>
                                                                <input type="text" name="lokasi" class="form-control" id="lokasi"   required="required" >
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" name="simpan" value="add" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-6x text-gray-300"></i>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-3 mb-10">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-8xl font-weight-bold text-warning text-uppercase mb-1">
                                                Absensi
                                            </div>
                                            <button type="button" class="btn btn-warning btn-sm" >
                                            Melihat Absensi
                                            </button>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-6x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-4 col-md-3 mb-10">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-8xl font-weight-bold text-success text-uppercase mb-1">
                                                Reports</div>
                                            <button type="button" class="btn btn-success btn-sm">
                                            Melihat Reports
                                            </button>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-6x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h2 class="h3 mb-2 text-gray-800">List Pertemuan</h2>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the </p>
                    
                    <?php
                    if(isset($_POST['simpan']))
                    {
                        //untuk menangkap data dari form 
                        $namapertemuan  = $_POST['namapertemuan'];
                        $tanggal        = $_POST['tanggal'];
                        $lokasi         = $_POST['lokasi'];
                        // untuk memasukan data ke database
                        $query = "INSERT INTO pertemuan VALUES ('','$namapertemuan' ,'$tanggal' , '$lokasi' )";

                        $hasil = mysqli_query($conn,$query);

                        if($query){

                            echo " <div class='alert alert-success' role='alert'>
                                <strong>Berhasil Menambahkan Pertemuan Baru!</strong> 
                            </div>
                            <meta http-equiv='refresh' content='1; url= index.php'/> ";
                            } else { 
                                echo "<div class='alert alert-warning' align='center'>
                                <strong>Gagal menambahkan Pertemuan baru!</strong> Anda akan dialihkan ke halaman sebelumnya.
                            </div>
                            <meta http-equiv='refresh' content='1; url= index.php'/> ";
                            }
                        } 
                    ?>     
       

                    <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pertemuan</h6>
                            </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Pertemuan</th>
                                            <th>Nama Pertemuan</th>
                                            <th>Waktu Pertemuan</th>
                                            <th>Lokasi</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $nourut   = 1;
                                    $select   = "SELECT * FROM `pertemuan`";
                                    $sel   = mysqli_query($conn, $select);
                                    while ($hasil = mysqli_fetch_array($sel)) {
                                        $idpertemuan        = $hasil['idpertemuan'];
                                        $namapertemuan       = $hasil['namapertemuan'];
                                        $tanggal           = $hasil['tanggal'];
                                        $lokasi            = $hasil['lokasi'];

                                    ?>
                                        <tr>
                                            <td><?php echo $nourut++;?></td>
                                            <td><?php echo $idpertemuan?></td>
                                            <td><?php echo $namapertemuan?></td>
                                            <td><?php echo $tanggal?></td>
                                            <td><?php echo $lokasi?></td>
                                            <td>
                                                <a class="btn btn-info" href="tambah peserta.php?idp=<?=$idpertemuan;?>" role="button">+Peserta</a>
                                                <a class="btn btn-warning" href="#" role="button">Absensi</a>
                                                <a class="btn btn-success" href="#" role="button">Report</a>
                                                
                                                

                                                
                                            </td>
                                        </tr>
                                        <?php 
									}
                                    ?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                        </div>
            
    


            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Website</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current 
                    .</div>
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