
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
      <script type="text/javascript">
         var mygallery = new fadeSlideShow({
            wrapperid: "fadeshow", //ID of blank DIV on page to house Slideshow
            dimensions: [400, 450], //width/height of gallery in pixels. Should reflect dimensions of largest image
            imagearray: [
               <?php echo $jsPicList; ?>
            ],
            displaymode: {type: 'manual', pause: 2500, cycles: 0, wraparound: false},
            persist: false, //remember last viewed slide and recall within same session?
            fadeduration: 500, //transition duration (milliseconds)
            descreveal: "always",
            togglerid: "fadeshowtoggler"
         })

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
         <div id="fadeshowwrapper">
            <div id="fadeshow"></div>

            <div id="fadeshowtoggler">
               <a href="#" class="prev"><img src="/images/left.png" style="border-width:0" alt="Go Left"></a>
               <span class="status" style="margin:0 50px; font-weight:bold"></span>
               <a href="#" class="next"><img src="/images/right.png" style="border-width:0" alt="Go Right"></a>
            </div>
         </div>
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