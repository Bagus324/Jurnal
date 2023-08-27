<?php
session_start();
require 'fungsi.php';
if (!isset($_SESSION['login_status'])) {
    header("Location: login.php");
}
$id_author = $_SESSION['id_author'];
$nama = $_SESSION['nama_author'];
$id = $_GET['id'];
$artikel = querydb("SELECT a.id_artikel, a.judul, a.tanggal, a.id_tag, t.nama_tag FROM artikel a JOIN tag t ON a.id_tag = t.id_tag  WHERE a.id_artikel = $id");
$tag_id = $artikel[0]['id_tag'];
$tag = querydb("SELECT * FROM tag");

if (isset($_POST['submit'])) {
    $_POST['id_author'] = $id_author;
    $_POST['id_tag'] = $tag_id;

    $output = del_artikel($_POST);
    if ($output > 0) {
        echo "<script> alert('Artikel berhasil dihapus')</script>";
        header("Location: tables.php");
    } else {
        echo "<script> alert('Terdapat kesalahan, Artikel gagal dihapus')</script>";
    }

}



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

                    
                    <form action="" method="post">
                        <?php foreach ($artikel as $row ):?>
                        <label class="col-sm-2 col-form-label">ID Artikel</label>
                        <input class="form-control" type="text" value="<?= $row['id_artikel']; ?>" name="id_artikel" readonly>
                        <label class="col-sm-2 col-form-label">Judul Artikel</label>
                        <input class="form-control" type="text" value="<?= $row['judul']; ?>" name="judul" readonly>
                        <label class="col-sm-2 col-form-label">Tag Artikel</label>
                        <input class="form-control" type="text" value="<?= $row['nama_tag']; ?>" name="nama_tag" readonly>
                        <label class="col-sm-2 col-form-label">Tanggal Terbit</label>
                        <input class="form-control" type="text" value="<?= $row['tanggal']; ?>" name="tanggal" readonly>
                        <?php endforeach ?>
                        <label class="col-sm-2 col-form-label">Alasan</label>
                        <input class="form-control" type="text" name="alasan">
                        <button class="btn btn-primary btn-user mt-3" type="submit" name="submit">
                            Submit
                        </button>
                    </form>

                    <!-- DataTales Example -->


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