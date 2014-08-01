
<!DOCTYPE html>
<html>
   <head>
      <!--/////////////////////////////////////////////
         /*
          * DOCUMENT     : plane.php
          * AUTHOR       : James Park
          * SITE         : www.worldwartwoairplanes.com
          * COPYRIGHT    : 2014
          * DESCRIPTION  : This is the view that is set up for displaying the
          *                information for a single plane; for the site 
          *                www.worldwartwoairplanes.com
          */
      /////////////////////////////////////////////-->
      <title><?php echo $planeInfo['plane_name']; ?> | World War II Airplanes</title>
      <?php 
      // This contains everything in the head tag
      include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; 
      ?>
      <!-- CSS and JS for the image slider -->
      <link href="/css/js-image-slider.css" rel="stylesheet" type="text/css" />
      <script src="/js/js-image-slider.js" type="text/javascript"></script>
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
         <header id="page_header">
            <a href="/index.php" title="Home"><img src="/images/logo.jpg" alt="Logo"></a>
            <div id="page_title"><?php echo $planeInfo['plane_name']; ?></div>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header_nav.php'; ?>
         </header>
         <?php
         // This will be the left nav area that will hold other similar type planes
         if (isset($leftNav)) {
            echo $leftNav;
         }
         ?>
         <main id="plane_description">
            <?php
            // This will be the main description area.
            if (isset($planeDescription)) {
               echo $planeDescription;
            }
            ?>
         </main><!--/content_container-->
         <?php 
         // This will be the specification table
         if (isset($specification)) {
            echo $specification;
         }
         ?>
         <!-- Slideshow goes here -->
         <div id="sliderFrame">
            <div id="slider">
               <?php echo $imageTags; ?>
            </div>
         </div><!--/sliderFrame-->
         <?php
         // This will be the sources if there are any.
         if (isset($sources)) {
            echo $sources;
         }
         // This is the footer and it includes the footer navigation
         include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php';
         ?>
      </div><!--/wrapper-->
   </body>
</html>