<?php
require 'fungsi.php';
$artikel = querydb("SELECT a.id_artikel, a.judul, a.tanggal, a.id_tag, t.nama_tag, a.gambar FROM artikel a JOIN tag t ON a.id_tag = t.id_tag WHERE stat_artikel = 1 ORDER BY a.id_artikel ASC");
$tag = querydb("SELECT * FROM tag");
$page_max = ceil(count($artikel)/4);


?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>About Me</title>
	<?php
include 'parts/head.php'
?>

<body id="top">

	<!-- header 
   ================================================== -->
   <?php
include 'parts/nav.php'
?>


   <!-- content
   ================================================== -->
   <section id="content-wrap" class="site-page">
   	<div class="row">
   		<div class="col-twelve">

   			<section>  

   				<div class="content-media">						
						<img src="images/thumbs/20221230_165710.jpg">						  
					</div>

					<div class="primary-content">

						<h1 class="entry-title add-bottom">Jurnals.</h1>	

						<p class="lead">
							Nama : Bagus Tri Yulianto Darmawan
							<br> NIM : 2007411056
							<br> Kelas : TI 5B
						</p> 

						<p>
							Jurnals merupakan sebuah website portal baca berita seperti pada umumnya. Website ini dibuat perihal Projek Akhir mata kuliah Pemrograman Web 2, web ini dibuat menggunakan Framework Bootstrap dan bahasa pemrograman HTML, PHP, dan juga sedikit Javascript.
						</p>


					</div>						

				</section>  		

			</div> <!-- end col-twelve -->
   	</div> <!-- end row -->
		
   </section> <!-- end content -->

   
   <!-- footer
   ================================================== -->
   <?php
include 'parts/foot.php'
?>

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>

</body>

</html>