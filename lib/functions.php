<?php

/*
 * DOCUMENT     : /lib/funcions.php
 * AUTHOR       : James Park
 * SITE         : www.worldwartwoairplanes.com
 * COPYRIGHT    : 2014
 * DESCRIPTION  : This is a file of helper functions for the site 
 *                www.worldwartwoairplanes.com
 */

/*
 * This is to grab the connection funcion to be able to connect to the 
 * database from the connection.php file. It is seperated in order to
 * keep sensitive info off of the github repository.
 */
require $_SERVER['DOCUMENT_ROOT'] . '/lib/connection.php';

/*
 * This function is for the home page image links
 */
function setHomePageLinks() {
   // Country pictures (as picture links)
   $output = '<figure class="countries">';
   $output .= '<a href="/?action=c&amp;type=allied" title="Got to the Allied Aircraft">'
            . '<img src="/images/home_page/allied.jpg" alt="Allied Aircaft"></a>';
   $output .= '</figure>';
   $output .= '<figure class="countries">';
   $output .= '<a href="/?action=c&amp;type=axis" title="Got to the Axis Aircraft">'
            . '<img src="/images/home_page/axis.jpg" alt="Axis Aircaft"></a>';
   $output .= '</figure>';
   // Airplane type pictures (as picture links)
   $output .= '<figure class="types">';
   $output .= '<a href="/?action=c&amp;type=fighters" title="Go to all fighters">'
            . '<img src="/images/home_page/hurricane.jpg" alt="Go to all fighters"></a>';
   $output .= '</figure>';
   $output .= '<figure class="types">';
   $output .= '<a href="/?action=c&amp;type=bombers" title="Go to all bombers">'
            . '<img src="/images/home_page/b17.jpg" alt="Go to all bombers"></a>';
   $output .= '</figure>';
   $output .= '<figure class="types">';
   $output .= '<a href="/?action=c&amp;type=transport" title="Go to all transport">'
            . '<img src="/images/home_page/c47.jpg" alt="Go to all transport"></a>';
   $output .= '</figure>';
   // Sources 
   $output .= '<section id="bibliography">Sources:<ul>';
   $output .= '<li><a href="http://www.freedigitalphotos.net/images/view_photog.php?photogid=994" '
            . 'title="Hawker Hurricane">Image: Bernie Condon / FreeDigitalPhotos.net</a></li>';
   $output .= '<li><a href="http://www.freedigitalphotos.net/images/view_photog.php?photogid=230" '
            . 'title="B-17">Image: Tim Beach / FreeDigitalPhotos.net</a></li>';
   $output .= '</ul></section><!--/bibliography-->';

   return $output;
}

/*
 * This function sets up the airplanes listed from the output from the 
 * database based on the category selected.
 */
function getPlanes($picList) {
   // start the $output as a string in order to do string concatenation
   $output = '';
   foreach ($picList as $planePic) {
      // Start figure tag
      $output .= '<figure class="planePic">';
      // Start the link tag with the id as the variable that will change
      // and the plane name for the title.
      $output .= '<a href="/?action=p&amp;id='.$planePic['plane_ID']
               . '" title="'.$planePic['plane_name'].'">';
      // Insert the image as the link and close the anchor tag
      $output .= '<img src="'.$planePic['urlPATH'].'" alt="'.$planePic['alt'].'"></a>';
      // Add a figcaption to put a link to the same plane as a text link
      // instead of a picture link, with the text being the plane name.
      $output .= '<figcaption><img src="'.$planePic['image_url'].'" alt="'.$planePic['flagAlt'].'" class="flag"> '
               . '<a href="/?action=p&amp;id='.$planePic['plane_ID']
               . '" title="'.$planePic['plane_name'].'">'
               . $planePic['plane_name'].'</a>';
      // Close the figcaption and figure tags.
      $output .= '</figcaption></figure>';
   }

   return $output;
}

/*
 * This function sets the description section for a plane, includes the 
 * main picture and the text description.
 */
function setPlaneDescription($planeInfo) {
   // <h1> of the plane name, then put the main picture inside a figure tag.
   $output = '<h1>'.$planeInfo['plane_name'].'</h1>';
   $output .= '<figure class="article_pic">';
   $output .= '<img src="'.$planeInfo['urlPATH'].'" alt="'.$planeInfo['alt'].'"></figure>';
   // Add the text description from the database, (should be stored in the 
   // database inside correct <p> tags)
   $output .= $planeInfo['description'];

   return $output;
}

/*
 * This function sets up the sources section, assuming it is stored 
 * inside correct <li> tags in the database
 */
function setUpSources($planeInfo) {
   $output = '<section id="bibliography">Sources:<ul>';
   $output .= $planeInfo['sources'].'</ul></section><!--/bibliography-->';

   return $output;
}

/*
 * This function sets up the specs table
 */
function setUpSpecs($specsInfo) {
   // use aside tag for html 5 semantics, and about the only time you should
   // still use tables in html 5
   $output = '<aside class="specs"><h2>Specifications:</h2>';
   $output .= '<table id="aside_table">';
   $output .= '<tr><td>Country:</td>'
            . '<td><img src="'.$specsInfo['image_url'].'" alt="'.$specsInfo['flagAlt'].'" class="flag"></td></tr>';
   $output .= '<tr><td>Maker:</td><td>'.$specsInfo['maker'].'</td></tr>';
   $output .= '<tr><td>Name:</td><td>'.$specsInfo['plane_name'].'</td></tr>';
   $output .= '<tr><td>First Flight:</td><td>'.$specsInfo['first_flight'].'</td></tr>';
   $output .= '<tr><td>Number Built:</td><td>'.$specsInfo['number_built'].'</td></tr>';
   $output .= '<tr><td>Crew Size:</td><td>'.$specsInfo['crew'].'</td></tr>';
   $output .= '<tr><td>Length:</td><td>'.$specsInfo['length'].'</td></tr>';
   $output .= '<tr><td>Wingspan:</td><td>'.$specsInfo['wingspan'].'</td></tr>';
   $output .= '<tr><td>Height:</td><td>'.$specsInfo['height'].'</td></tr>';
   $output .= '<tr><td>Max Speed:</td><td>'.$specsInfo['max_speed'].'</td></tr>';
   $output .= '<tr><td>Cruise Speed:</td><td>'.$specsInfo['cruise_speed'].'</td></tr>';
   $output .= '<tr><td>Stall Speed:</td><td>'.$specsInfo['stall_speed'].'</td></tr>';
   $output .= '<tr><td>Max Range:</td><td>'.$specsInfo['distance'].'</td></tr>';
   $output .= '<tr><td>Guns:</td><td>'.$specsInfo['guns'].'</td></tr>';
   $output .= '<tr><td>Bombs:</td><td>'.$specsInfo['bombs'].'</td></tr>';
   $output .= '</table></aside>';

   return $output;
}

/*
 * This function sets the similar planes nav section
 */
function setPlaneNav($similarPlanes) {
   $output = '<nav id="left_nav"><h2>Similar Aircraft:</h2><ul>';
   foreach ($similarPlanes as $plane) {
      $output .= '<li><img src="'.$plane['image_url'].'" alt="'.$plane['flagAlt'].'" class="flag"> '
               . '<a href="/?action=p&amp;id='.$plane['plane_ID']
               . '" title="'.$plane['plane_name'].'">'
               . $plane['plane_name'].'</a></li>';
   }
   $output .= '</ul></nav><!--/left_nav-->';

   return $output;
}

/*
 * This function sets up the code that is needed to include all of the
 * pictures for a given airplane so that the javascript slider knows all
 * of the pictures paths.
 */
function jsScript($planePics) {
   // Get how many pictures were returned from the database query
   $count = count($planePics);
   $i = 1;
   // start $output as a string
   $output = '';
   while ($count >= $i) {
      // if this is the last picure, don't include the comma after the 
      // last "]". Otherwise, include the comma.
      if ($count == $i) {
         $output .= '["'.$planePics[($i-1)][0].'"]
         ';
      } else {
         $output .= '["'.$planePics[($i-1)][0].'"],
         ';
      }
      $i++;
   }

   return $output;
}
/*
 * This function sets up a bunch of img tags with a certain planes
 * images for the image slider at the bottom of the page.
 */
function setImageTags($planePics) {
   $output = '';
   foreach ($planePics as $pic) {
      $output .= '<img src="'.$pic['urlPATH'].'" alt="'.$pic['alt'].'">';
   }

   return $output;
}
?>