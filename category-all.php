<?php
require 'fungsi.php';

$tag = querydb("SELECT * FROM tag");

?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<title>Abstract</title>
<style>
ul.kategori {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  float:	left;
}



a.kategori {
  padding: 30px;
}
</style>
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
   <div id="content-wrap" class="styles">

   	<div class="row narrow add-bottom text-center">

   		<div class="col-twelve tab-full">

   			<h1>All Categories</h1>			

   		</div>

     	</div>

     	<div class="row">

     		<div class="col-twelve tab-full">

			 <?php foreach ($tag as $row) : ?>
				<ul class="kategori">
					<li><a href="category.php?id=<?= $row['id_tag']; ?>" class="kategori"><?= ucfirst($row['nama_tag']) ?></a></li>
				</ul>

            <?php endforeach; ?>

	      </div>        

		</div> <!-- end row -->

			 </div>


   
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