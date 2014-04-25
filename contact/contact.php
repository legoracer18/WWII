<?php
session_start();
?><!DOCTYPE html>
<html>
   <head>
      <title>Contact | World War II Airplanes</title>
      <?php 
      // This contains everything in the head tag
      include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; 
      ?>
   </head>
   <body>
      <div id="wrapper">
         <header id="page_header">
            <a href="/index.php" title="Home"><img src="/images/logo.jpg" alt="Logo"></a>
            <div id="page_title">
               Contact Page
            </div>
               <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header_nav.php' ?>
         </header>
         <section id="content_container">
            <div id="support_content">
               <div id="form_wrapper">
                  <h1>Contact Page</h1>
                  <p>All fields are required and please supply a real email address
                     in order to receive a reply.</p>
                  <div id="php_error">
                     <?php
                        if(!empty($errors)){
                           echo "<ul>";
                           foreach ($errors as $value) {
                              echo "<li>$value</li>";
                           }
                           echo "</ul>";
                        }
                     ?>
                  </div>
                  <div id="php_success">
                     <?php
                        if(!empty($response)){
                           echo "<p>$response</p>";
                        }
                     ?>
                  </div>
                  <form method="post" action="control.php">
                     <fieldset>
                        <legend>Personal Information</legend>
                        <p><label for="firstname">First Name:</label>
                        <input type="text" name="firstname" id="firstname"  placeholder="First Name"></p>
                        <p><label for="lastname">Last Name:</label>
                        <input type="text" name="lastname" id="lastname"  placeholder="Last Name"></p>
                        <p><label for="email">Email:</label>
                        <input type="email" name="email" id="email"  placeholder="example@domain.com"></p>
                        <p><label for="reply">Do you want a reply?</label>
                        <input type="checkbox" name="reply" id="reply" value="yes"> (check if yes)</p>
                     </fieldset>
                     <fieldset>
                        <legend>Message Information</legend>
                        <p><label for="reason">Reason:</label>
                        <select name="reason" id="reason">
                           <option value="">Choose One...</option>
                           <option value="Broken Link">Broken Link</option>
                           <option value="Have Info">Have More Information</option>
                           <option value="Need Info">Need More Information</option>
                           <option value="Design">Design Suggestion(s)</option>
                           <option value="Other">Other:</option>
                        </select></p>
                        <p><label for="subject">Subject:</label>
                        <input type="text" name="subject" id="subject" placeholder="Subject"></p>
                        <p><label for="message">Message:</label>
                        <textarea name="message" id="message" placeholder="Type your message here."></textarea></p>
<!--                        This displays the captcha image-->
                        <p><label>&nbsp;</label>
                        <img id="captcha" src="captcha_images.php?width=100&amp;height=40&amp;characters=5" alt="captcha image">
                        (Type these characters below)</p>
<!--                      This allows the user to type in what they see -->
                        <p><label for="cap_code">Security Code:</label>
                        <input id="cap_code" name="cap_code" type="text" size="6"></p>
                        <label>&nbsp;</label>
                        <p><input type="submit" name="action" value="Send Message"></p>
                     </fieldset>
                  </form>
               </div>
            </div>
         </section>
         <aside id="contact_aside">
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/vcard.php' ?>
         </aside>
         <footer id="page_footer">
            <nav id="footer_nav">
               <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer_nav.php' ?>
            </nav>
            <div>
               © 2012 www.worldwartwoairplanes.com | | 
               <?php echo 'Last Updated: ' . date('d F Y', getlastmod()) ?>
            </div>
         </footer>
      </div>
   </body>
</html>