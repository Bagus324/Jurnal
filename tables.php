<?php
session_start();
require 'fungsi.php';
if (!isset($_SESSION['login_status'])) {
    header("Location: login.php");
}
$id = $_SESSION['id_author'];
$nama = $_SESSION['nama_author'];
$create_artikel_count = querydb("SELECT a.id_artikel, a.judul, a.tanggal, t.nama_tag FROM artikel a JOIN tag t ON a.id_tag = t.id_tag  WHERE a.id_author = $id");
$artikel = querydb("SELECT a.id_artikel, a.judul, a.tanggal, t.nama_tag FROM artikel a JOIN tag t ON a.id_tag = t.id_tag  WHERE a.id_author = $id AND a.stat_artikel = 1");
$tag = querydb("SELECT * FROM tag");

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
include 'parts/bs.php'
?>

    <title>SB Admin 2 - Tables</title>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
include 'parts/side.php'
?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
include 'parts/nav_admin.php'
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- Page Heading -->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Jumlah artikel terbit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($artikel); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Jumlah artikel terbuat</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($create_artikel_count); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                            
                    
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Judul Artikel</th>
                                            <th>Tag</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($artikel as $row) : ?>
                                        <tr>
                                            <td><?= $row['judul'] ?></td>
                                            <td><?= $row['nama_tag'] ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td>
                                                <a class="btn btn-primary"href="artikel.php?id=<?= $row['id_artikel']; ?>">Open&ensp;<i class="fa fa-window-maximize" aria-hidden="true"></i></a>
                                                <a class="btn btn-danger" href="del_artikel.php?id=<?= $row['id_artikel']; ?>">Delete&ensp;<i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>