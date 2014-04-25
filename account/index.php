<?php

/*
 * This is the account controller for the site www.worldwartwoairplanes.com
 */
if (!$_SESSION) {
  session_start();
}

require $_SERVER['DOCUMENT_ROOT'] . '/model/account_model.php';

if (isset($_POST['action'])) {
  $action = valString($_POST['action']);
} elseif (isset($_GET['action'])) {
  $action = valString($_GET['action']);
}


?>