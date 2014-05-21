<?php

/*
 * DOCUMENT     : /account/index.php
 * AUTHOR       : James Park
 * SITE         : www.worldwartwoairplanes.com
 * COPYRIGHT    : 2014
 * DESCRIPTION  : This is the account controller file for the site 
 *                www.worldwartwoairplanes.com
 */

// If there is no session, start one.
if (!$_SESSION) {
  session_start();
}

/*
 * This grabs the model that is for the account info stuff that will then
 * grab a file with helper functions as well as the connection to the database
 * function.
 */
require $_SERVER['DOCUMENT_ROOT'] . '/model/account_model.php';

/*
 * Check first in $_POST then the URL for an 'action' variable and store
 * that info to be checked against, in order to call the correct functions
 * and views.
 */
if (isset($_POST['action'])) {
  $action = valString($_POST['action']);
} elseif (isset($_GET['action'])) {
  $action = valString($_GET['action']);
}

if ($action == 'Register') {
   /*
    * Register a new person
    */
} else {
   /*
    * Default action, send it to the registration page.
    */
   $title = 'Registration';
   include $_SERVER['DOCUMENT_ROOT'] . '/views/register.php';
   exit;
}

?>