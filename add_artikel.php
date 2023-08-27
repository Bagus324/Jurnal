<?php
session_start();
require 'fungsi.php';
if (!isset($_SESSION['login_status'])) {
    header("Location: login.php");
}
$id = $_SESSION['id_author'];
$nama = $_SESSION['nama_author'];
$tag = querydb("SELECT * FROM tag");

if (isset($_POST['submit'])) {
        $_POST['id_author'] = $id;
        $output = tambah($_POST);

        if ($output > 0) {
            echo "<script> alert('Artikel berhasil dirilis')</script>";
        } else {
            echo "<script> alert('Terdapat kesalahan, Artikel gagal dirilis')</script>";
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

                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="judul" name="judul">
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control form-control-user" id="editor" name="editor"></textarea>
                </div>
                <div class="form-group">
                <select id="id_tag" name="id_tag">
                <?php foreach ($tag as $row) : ?>
                        <option value="<?= $row['id_tag']; ?>"><?= ucfirst($row['nama_tag']) ?></option>
                 <?php endforeach; ?>
                 </select>
                 <input type="file" accept="image/*" name="gambar" id="gambar">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary btn-user mt-3" type="submit" name="submit">
                </div>

                </form>
                
                <script>
                        ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading','|', 'bold',  'italic', '|', 'bulletedList', 'numberedList', '|', 'blockQuote' , 'link', '|', 'undo', 'redo' ]
    } )
    .catch( error => {
        console.log( error );
    } );
                </script>
                    


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