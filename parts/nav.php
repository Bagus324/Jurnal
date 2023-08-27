<header class="short-header">   

<div class="gradient-block"></div>	

<div class="row header-content">

    <div class="logo">
      <a href="index.php">Author</a>
   </div>
   
    <?php $i = 1; ?>
    <nav id="main-nav-wrap">
         <ul class="main-navigation sf-menu">
             <li><a href="index.php" title="">Home</a></li>									
             <li class="has-children">
                 <a href="category-all.php" title="">Categories</a>
                 <ul class="sub-menu">
                 <?php foreach ($tag as $row) : ?>
                 <li><a href="category.php?id=<?= $row['id_tag']; ?>"><?= ucfirst($row['nama_tag']) ?></a></li>
                 <?php if ($i === 3) {
                     break;
                 } ?>
                 <?php $i++; ?>
                 <?php endforeach; ?>
              </ul>
             </li>
             <li><a href="about.php" title="">About</a></li>									
         </ul>
     </nav> <!-- end main-nav-wrap -->

     
</div>     		

</header> <!-- end header -->