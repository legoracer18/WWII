<?php

/*
 * This is the main controller for the site www.worldwartwoairplanes.com
 */
if (!$_SESSION) {
  session_start();
}


require $_SERVER['DOCUMENT_ROOT'] . '/model/model.php';
if (isset($_GET['action'])) {
   $action = $_GET['action'];
}

if ($action == 'p' && isset($_GET['id'])) {
   /*
    * This is the individual plane page section
    */
   $id = (int) $_GET['id'];
   
   // Get the plane info, plus the main image for that plane.
   $planeInfo = getPlaneInfo($id);

   // Get and set up the nav info
   $similarPlanes = getSimilarPlanes($planeInfo['plane_type']);
   $leftNav = setPlaneNav($similarPlanes);

   // Set up the Description portion with heading and image.
   $planeDescription = getPlaneDescription($planeInfo);

   // Get the info, then set up the specifcation table
   $specsInfo = getSpecsInfo($id);
   $specification = setUpSpecs($specsInfo);

   // Get and set up the pictures for the slider.
   $planePics = getPlanePics($id);
   $jsPicList = jsScript($planePics);
   //var_dump($jsPicList);
   
   // Set up the sources section
   $sources = setUpSources($planeInfo);

   include $_SERVER['DOCUMENT_ROOT'] . '/views/plane.php';
   exit;
} elseif ($action == 'c' && isset($_GET['type'])) {
   /*
    * This is the category pages, like what planes were axis, what planes were fighters, etc.
    */
   $type = $_GET['type'];
   // Get a list of Picture paths for the given type from the database
   switch ($type) {
      case "allied":
         $type = 'Allied Aircraft';
         $picList = getCountryCat(1001, 1002, 1003);
         break;
      case "axis":
         $type = 'Axis Aircraft';
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
   $pageInfo = getSupport(1001);
   $homePageLinks = setHomePageLinks();
   include $_SERVER['DOCUMENT_ROOT'] . '/views/support.php';
   exit;
}
?>