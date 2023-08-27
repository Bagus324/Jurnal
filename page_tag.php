<?php
require 'fungsi.php';
$filter_tag = $_GET['id'];
$tag = querydb("SELECT * FROM tag");
$tag2 = querydb("SELECT * FROM tag WHERE id_tag = $filter_tag")[0];
$artikel = querydb("SELECT a.id_artikel, a.judul, a.tanggal, a.id_tag, t.nama_tag, a.gambar FROM artikel a JOIN tag t ON a.id_tag = t.id_tag WHERE stat_artikel = 1 AND a.id_tag = $filter_tag ORDER BY a.id_artikel ASC");
$page_max = ceil(count($artikel)/4);
$page = $_GET['page']-1;
$counter_artikel = 0;
$counter = 0;


?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<title>Abstract</title>

<?php
include 'parts/head.php'
?>

<body id="top">

	<!-- header 
   ================================================== -->

   <?php
include 'parts/nav.php'
?>

   <!-- masonry
   ================================================== -->
   <section id="bricks">

   	<div class="row masonry">

   		   		<!-- brick-wrapper -->
					  <div class="bricks-wrapper">

<div class="grid-sizer"></div>
   <?php foreach ($artikel as $row) :?>
	   <?php if ($counter === $page):?>
<article class="brick entry format-standard">

<div class="entry-thumb">
<a href="artikel.php?id=<?= $row['id_artikel']; ?>">
<img src="img/<?= $row['gambar']; ?>"> 
</a>
</div>

<div class="entry-text">
<div class="entry-header">

<div class="entry-meta">
<span class="cat-links">
   <a href="category.php?id=<?= $row['id_tag']; ?>"><?= ucfirst($row['nama_tag']); ?></a>                			
</span>			
</div>

<h1 class="entry-title"><a href="artikel.php?id=<?= $row['id_artikel']; ?>"><?= $row['judul']; ?></a></h1>

</div>
</div>

</article> <!-- end article -->
<?php endif?>
<?php $counter_artikel++; ?>
<?php if ($counter_artikel === 4) {
$counter_artikel = 0;
$counter++;
} ?>
<?php endforeach; ?>


</div> <!-- end brick-wrapper --> 

   	</div> <!-- end row -->

   	<div class="row">
   		
   		<nav class="pagination">
			<?php for ($i = 1; $i <= $page_max; $i++):?>
				<?php if ($i === 1) :?>
					<a href="category.php?id=<?= $tag2['id_tag']; ?>" class="page-numbers"><?= $i?></a>
				<?php else: ?>
					<a href="category.php?id=<?= $tag2['id_tag']; ?>&amp;page=<?= $i ?>" class="page-numbers"><?= $i?></a>
				<?php endif; ?>
				
			<?php endfor;?>
	      </nav>

   	</div>

   </section> <!-- end bricks -->

   
   <!-- footer
   ================================================== -->
   <?php
include 'parts/foot.php'
?>


   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/jquery.appear.js"></script>
   <script src="js/main.js"></script>

</body>

</html>