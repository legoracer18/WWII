<?php
session_start();

/*
 * Conrol and process the contact page
 */

if($_POST['action'] == 'Send Message'){
   
   //Collect the data
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $reply = $_POST['reply'];
   $reason = $_POST['reason'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];
   
   //Validate the data
   $errors = array();
   if(empty($firstname) || empty($lastname) || empty($email) || empty($reason) 
           || empty($subject) || empty($message)){
      $errors[0] = 'Sorry, all fields are required.';
   }
   if(empty($firstname)){
      $errors[1] = 'First Name is required.';
   }
   if(empty($lastname)){
      $errors[2] = 'Last Name is required.';
   }
   if(empty($email)){
      $errors[3] = 'Email is required.';
   }
   if(empty($reason)){
      $errors[4] = 'Reason is required.';
   }
   if(empty($subject)){
      $errors[5] = 'Subject is required.';
   }
   if(empty($message)){
      $errors[6] = 'Message is requred.';
   }
   if($_SESSION['security_code'] != $_POST['cap_code'] && !empty($_SESSION['security_code'])) {
      $errors[7] = 'Sorry, your entered security code does not match the security image.';
   }
   
   //Check for errors, send back to be fixed
   if(!empty($errors)){
      include 'contact.php';
      exit;
   }
   
   //If no errors, process it
   $to = "worldwartwoairplanes@gmail.com";
   $from = "From: $email";
   $message .= "\n\n";
   $message .= "Name: $firstname $lastname\n";
   $message .= "Reply: $reply\n";
   $message .= "Reason: $reason";
   
   $success = mail($to, $subject, $message, $from);
   
   //Inform the client
   if($success){
      $response = "Thanks $firstname, your input has been recieved and you will 
      hear back soon if you wanted a response.";
   } else{
      $response = "Sorry $firstname, but there was a problem.  We have sent a pack
      of monkeys to figure it out.  Try again soon.";
   }
   
   include 'contact.php';
   exit;
} else{
   header('Location: contact.php');
   exit;
}
?>