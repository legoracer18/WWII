
<!DOCTYPE html>
<html>
   <head>
      <!--/////////////////////////////////////////////
         /*
          * DOCUMENT     : register.php
          * AUTHOR       : James Park
          * SITE         : www.worldwartwoairplanes.com
          * COPYRIGHT    : 2014
          * DESCRIPTION  : This is the view that is set up for displaying the
          *                register user form; for the site 
          *                www.worldwartwoairplanes.com
          */
      /////////////////////////////////////////////-->
      <title><?php echo $title; ?> | World War II Airplanes</title>
      <?php 
      // This contains everything in the head tag
      include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; 
      ?>
   </head>
   <body>
      <div id="wrapper">
        <header id="page_header">
          <a href="/index.php" title="Home"><img src="/images/logo.jpg" alt="Logo"></a>
          <div id="page_title"><?php echo $title; ?></div>
          <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header_nav.php'; ?>
        </header>
        <main id="register_form_container">
          <h1>Registration Page</h1>
          <?php
          /*
           * If there are errors with the registration, they will show up here.
           */
          if (isset($message)) {
            // $message will hold the failure message
            echo '<h1>Registration Failed</h1>';
            echo '<p>'.$message.'</p>';
          } elseif ($errors) {
            // Errors are from the input validation
            echo '<h1>Registration Failed</h1>';
            $error_display = '<ul>';
            foreach ($errors as $value) {
              $error_display .= '<li>'.$value.'</li>';
            }
            $error_display .= '</ul>';
            echo $error_display;
          }
          ?>
          <!--Begin the form where the input from the user will be entered.-->
          <form method="post" action="." id="regform">
            <fieldset>
              <legend>Individual Information</legend>
              <label for="firstname">First Name:</label>
              <input type="text" name="firstname" id="firstname" required value="<?php echo $firstname ?>">
              <br>
              <label for="lastname">Last Name:</label>
              <input type="text" name="lastname" id="lastname" required value="<?php echo $lastname ?>">
              <p>
              <b id="gender">Gender</b><br>
              <label for="female">Female</label>
              <input type="radio" <?php
              if ($gender == 'F') {
                echo 'checked';
              }
              ?> name="gender" id="female" value="F">
              <label for="male">Male</label>
              <input type="radio" name="gender" <?php
              if ($gender == 'M') {
                echo 'checked';
              }
              ?> id="male" value="M">
              </p>
              <p id="dob">
                <b>Date of Birth</b> (YYYY/MM/DD, e.g. <?PHP echo date('Y/m/d'); ?>)<br>
                <label for="year">Year</label>
                <input type="number" min="1900" max="2014" name="year" placeholder="YYYY" required id="year" value="<?php echo $year ?>"> /
              <label for="month">Month</label>
              <input type="number" name="month" max="12" min="01" placeholder="MM" required id="month" value="<?php echo $month ?>"> /
              <label for="day">Day</label>
              <input type="number" max="31" min="01" name="day" placeholder="DD" required id="day" value="<?php echo $day ?>">
              </p>
              
            </fieldset>
            <fieldset>
              <legend>Credential Information</legend>
              <label for="email">Email:</label>
              <input type="email" name="email" required id="email" value="<?php echo $email ?>">
              <label for="password">Password:</label>
              <input type="password" required name="password" id="password">
              <label for="password">Re-enter Password:</label>
              <input type="password" required name="password2" id="password2">
              <label for="qtn">Security Question:</label>
              <input type="text" name="qtn" required id="qtn" value="<?php echo $secqtn ?>">
              <label for="ans">Security Answer:</label>
              <input type="text" required name="ans" id="ans" value="<?php echo $secans ?>">
              <label for="action">&nbsp;</label>
              <input type="submit" name="action" id="action" value="Register">
            </fieldset>
          </form>
        </main><!--/register_form_container-->
        <?php
        // This is the footer and it includes the footer navigation
        include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php';
        ?>
      </div><!--/wrapper-->
   </body>
</html>