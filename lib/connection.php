<?php 

/*
 * The only reason why this is seperated is so that I can hide sensitive
 * information from people on github.
 */

/*
 * This function is for the connection to the database
 */
function dbConnection() {
// The username, password, and dbname should be filled in with info.
   $server     = 'localhost';
   $username   = '';
   $password   = '';
   $dbname     = '';
   $dsn        = 'mysql:host='.$server.';dbname='.$dbname;
   
   try {
      $wwii = new PDO($dsn, $username, $password);
   } catch (PDOException $e) {
      header('Location: /500.php');
      exit;
   }

   if (!empty($wwii)){
      return $wwii;
   } else {
      header('Location: /500.php');
      exit;
   }
}


?>