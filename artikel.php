<?php
require 'fungsi.php';
$id = $_GET['id'];
$artikel = querydb("SELECT * FROM artikel WHERE id_artikel = $id")[0];
$next = querydb("SELECT * FROM artikel WHERE id_artikel != $id");
$selanjutnya = array_rand($next,1);
$selanjutnya = $next[$selanjutnya];
$tag = querydb("SELECT * FROM tag");

?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Standard Format Post - Abstract</title>
	<?php
include 'parts/head.php'
?>

<body id="top">

	<!-- header 
   ================================================== -->
   <?php
include 'parts/nav.php'
?>

<style>
img.gambar_artikel {
	height: 500px;
	width: 840px;
}
</style>

   <!-- content
   ================================================== -->
   <section id="content-wrap" class="blog-single">
   	<div class="row">
   		<div class="col-twelve">

   			<article class="format-standard">  

   				<div class="content-media">
						<div class="post-thumb">
							<img src="img/<?= $artikel['gambar']; ?>" class="gambar_artikel"> 
						</div>  
					</div>

					<div class="primary-content">

						<h1 class="page-title"><?php echo $artikel['judul']; ?></h1>	

						<ul class="entry-meta">
							<li class="date"><?php
							$id_author = $artikel['id_author'];
							$author = querydb("SELECT nama_author FROM author WHERE id_author = $id_author")[0];
							echo ucfirst($author['nama_author']).", ".$artikel['tanggal']; ?></li>		
							<li class="cat"><a href="category.php?id=<?= $artikel['id_tag']; ?>"><?php
							$id_tag = $artikel['id_tag'];
							$tag_artikel = querydb("SELECT nama_tag FROM tag WHERE id_tag = $id_tag")[0];
							echo ucfirst($tag_artikel['nama_tag']); ?></a></li>							
						</ul>		
		
						<?php echo $artikel['isi']?>						

					</div> <!-- end entry-primary -->		  			   

	  			   <div class="pagenav group">
		  			   <div class="prev-nav">
		  			   	<a href="artikel.php?id=<?= $selanjutnya['id_artikel']; ?>" rel="prev">
		  			   		<span>Selanjutnya</span>
		  			   		 <?php echo $selanjutnya['judul']?>
		  			   	</a>
		  			   </div> 				   
	  				</div>

				</article>
   		

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