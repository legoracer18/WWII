<!DOCTYPE html>
<html>
   <head>
      <!--/////////////////////////////////////////////
         /*
          * DOCUMENT     : support.php
          * AUTHOR       : James Park
          * SITE         : www.worldwartwoairplanes.com
          * COPYRIGHT    : 2014
          * DESCRIPTION  : This is the view that is set up for displaying a
          *                general page where all (except for the home page) the 
          *                content is straight from the database; for the site 
          *                www.worldwartwoairplanes.com
          */
      /////////////////////////////////////////////-->
      <title><?php echo $pageInfo['title']; ?> | World War II Airplanes</title>
      <?php 
      // This contains everything in the head tag
      include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; 
      ?>
       <!-- Google Analytics -->
      <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

         ga('create', 'UA-28788120-3', 'worldwartwoairplanes.com');
         ga('require', 'displayfeatures');
         ga('send', 'pageview');

      </script>
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