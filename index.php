<?php

/*
 * DOCUMENT     : /index.php
 * AUTHOR       : James Park
 * SITE         : www.worldwartwoairplanes.com
 * COPYRIGHT    : 2014
 * DESCRIPTION  : This is the main controller for the site 
 *                www.worldwartwoairplanes.com
 */

// If there is no session, start one.
if (!$_SESSION) {
  session_start();
}

/*
 * Require the main model to interact with the database. The model
 * will then require the functions.php file in order to include the
 * helper functions. That will then require the connection.php file
 * that holds the connection info to connect to the database.
 */
require $_SERVER['DOCUMENT_ROOT'] . '/model/model.php';

/*
 * If there is something in the URL named 'action' grab it. This is
 * what is used to test against to fall into the correct portion of 
 * the logic in order to call the correct functions.
 */
if (isset($_GET['action'])) {
   $action = $_GET['action'];
}

if ($action == 'p' && isset($_GET['id'])) {
   /*
    * This is the individual plane page section
    */
   
   // grab the id of the plane that was requested.
   $id = (int) $_GET['id'];
   
   // Get the plane info, plus the main image for that plane.
   // Calls to the model.php
   $planeInfo = getPlaneInfo($id);

   // Get and set up the similar plane nav info based on the plane type
   // Calls to the model.php
   $similarPlanes = getSimilarPlanes($planeInfo['plane_type']);
   // Calls to the functions.php
   $leftNav = setPlaneNav($similarPlanes);

   // Set up the Description portion with heading and image.
   // Calls to the functions.php
   $planeDescription = setPlaneDescription($planeInfo);

   // Get the info, then set up the specifcation table
   // Calls to the model.php
   $specsInfo = getSpecsInfo($id);
   // Calls to the functions.php
   $specification = setUpSpecs($specsInfo);

   // Get and set up the pictures for the slider.
   // Calls to the model.php
   $planePics = getPlanePics($id);
   // Calls to the functions.php
   $jsPicList = jsScript($planePics);
   
   // Set up the sources section
   // Calls to the functions.php
   $sources = setUpSources($planeInfo);

   include $_SERVER['DOCUMENT_ROOT'] . '/views/plane.php';
   exit;
} elseif ($action == 'c' && isset($_GET['type'])) {
   /*
    * This is the category pages, like what planes were axis, what planes were fighters, etc.
    */
   
   // Grab the type of plane to determine what planes to display.
   $type = $_GET['type'];

   // Get a list of Picture paths for the given type from the database
   // Change the $type variable, it will be echoed in the view.
   switch ($type) {
      case "allied":
         $type = 'Allied Aircraft';
         // Allied countries of the id of 1001, 1002, and 1003
         $picList = getCountryCat(1001, 1002, 1003);
         break;
      case "axis":
         $type = 'Axis Aircraft';
         // Axis countries of the id of 1004, 1005, and 1006
         $picList = getCountryCat(1004, 1005, 1006);
         break;
      case "fighters":
         $type = 'Fighter Aircraft';
         $typeCast = 'F';
         $picList = getTypeCat($typeCast);
         break;
      case "bombers":
         $type = 'Bomber Aircraft';
         $typeCast = 'B';
         $picList = getTypeCat($typeCast);
         break;
      case "transport":
         $type = 'Transport Aircraft';
         $typeCast = 'T';
         $picList = getTypeCat($typeCast);
         break;
   }
   // Set up the html code that will display the pictures of planes that 
   // will link to that planes' info page.
   $planeList = getPlanes($picList);

   include $_SERVER['DOCUMENT_ROOT'] . '/views/category.php';
   exit;
} elseif ($action == 's' && isset($_GET['id'])){
   /*
    * This is all other support pages like style Guide, etc.
    */
   $id = $_GET['id'];
   $pageInfo = getSupport($id);

   include $_SERVER['DOCUMENT_ROOT'] . '/views/support.php';
   exit;
} else {
   /*
    * This is the home page.
    */
   // Home page info has an id of 1001
   $pageInfo = getSupport(1001);
   $homePageLinks = setHomePageLinks();

   include $_SERVER['DOCUMENT_ROOT'] . '/views/support.php';
   exit;
}
?>