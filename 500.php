<!DOCTYPE html>
<html>
   <head>
      <title>500 Error | World War II Airplanes</title>
      <?php 
      // This contains everything in the head tag
      include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; 
      ?>
   </head>
   <body>
      <div id="wrapper">
         <header id="page_header">
            <a href="/index.php" title="Home"><img src="/images/logo.jpg" alt="Logo"></a>
            <div id="page_title">500 Error</div>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/header_nav.php'; ?>
         </header>
         <main id="error_pages">
            <h1>Oh No!</h1>
            <figure id="error_image">
               <img src="/images/500.jpg" alt="500 Error">
            </figure>
            
            <p>Something went horribly wrong in the server room and as an emergency 
               plan, you were directed here. If this continues to happen please use the 
               <a href="/contact" title="Contact Page">contact page</a> to send a distress
               signal.</p>
         </main><!--/content_container-->
         <?php 
         // This is the footer and it includes the footer navigation
         include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php' 
         ?>
      </div><!--/wrapper-->
   </body>
</html>