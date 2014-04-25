<!DOCTYPE html>
<html>
   <head>
      <title><?php echo $type; ?> | World War II Airplanes</title>
      <?php 
      // This contains everything in the head tag
      include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; 
      ?>
   </head>
   <body>
      <div id="wrapper">
         <header id="page_header">
            <a href="/index.php" title="Home"><img src="/images/logo.jpg" alt="Logo"></a>
            <div id="page_title"><?php echo $type; ?></div>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header_nav.php'; ?>
         </header>
         <main id="content_container">
            <?php
            // This will hold everything that is between the header and the footer.
            echo $planeList;
            ?>
         </main><!--/content_container-->
         <?php 
         // This is the footer and it includes the footer navigation
         include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php' 
         ?>
      </div><!--/wrapper-->
   </body>
</html>