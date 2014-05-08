<!DOCTYPE html>
<html>
   <head>
      <title><?php echo $pageInfo['title']; ?> | World War II Airplanes</title>
      <?php 
      // This contains everything in the head tag
      include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; 
      ?>
   </head>
   <body>
      <div id="wrapper">
         <?php 
         // This is the header and it includes the header navigation
         include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; 
         ?>
         <main id="content_container">
            <?php
            // This will hold everything that is between the header and the footer.
            echo '<section id="text_field">'.$pageInfo['html_code'].'</section>';
            if (isset($homePageLinks)) {
               echo $homePageLinks;
            }
            ?>
         </main><!--/content_container-->
         <?php 
         // This is the footer and it includes the footer navigation
         include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php' 
         ?>
      </div><!--/wrapper-->
   </body>
</html>