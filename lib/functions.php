<?php
/*
 * This is a file of helper functions for the site www.worldwartwoairplanes.com
 */

/*
 * This is to grab the connection funcion to be able to connect to the database.
 */
require $_SERVER['DOCUMENT_ROOT'] . '/lib/connection.php';

/*
 * This function is for the home page image links
 */
function setHomePageLinks() {
   // Country pictures
   $output = '<figure class="countries">';
   $output .= '<a href="/?action=c&amp;type=allied" title="Got to the Allied Aircraft">'
            . '<img src="/images/home_page/allied.jpg" alt="Allied Aircaft"></a>';
   $output .= '</figure>';
   $output .= '<figure class="countries">';
   $output .= '<a href="/?action=c&amp;type=axis" title="Got to the Axis Aircraft">'
            . '<img src="/images/home_page/axis.jpg" alt="Axis Aircaft"></a>';
   $output .= '</figure>';
   // Airplane type pictures
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
 * This function gets the airplanes listed from the output from the database.
 */
function getPlanes($picList) {
   $output = '';
   foreach ($picList as $planePic) {
      $output .= '<figure class="planePic">';
      $output .= '<a href="/?action=p&amp;id='.$planePic['plane_ID']
               . '" title="'.$planePic['plane_name'].'">';
      $output .= '<img src="'.$planePic['urlPATH'].'" alt="'.$planePic['alt'].'"></a>';
      $output .= '<figcaption><img src="'.$planePic['image_url'].'" alt="'.$planePic['flagAlt'].'" class="flag"> '
               . '<a href="/?action=p&amp;id='.$planePic['plane_ID']
               . '" title="'.$planePic['plane_name'].'">'
               . $planePic['plane_name'].'</a>';
      $output .= '</figcaption></figure>';
   }

   return $output;
}

/*
 * This function gets the description section for a plane all set up.
 */
function setPlaneDescription($planeInfo) {
   $output = '<h1>'.$planeInfo['plane_name'].'</h1>';
   $output .= '<figure class="article_pic">';
   $output .= '<img src="'.$planeInfo['urlPATH'].'" alt="'.$planeInfo['alt'].'"></figure>';
   $output .= $planeInfo['description'];

   return $output;
}

/*
 * This function sets up the sources section, assuming it is stored as <li> in database
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

function jsScript($planePics) {
   $count = count($planePics);
   $i = 1;
   $output = '';
   //$output = '<script type="text/javascript">';
   //$output .= 'var mygallery = new fadeSlideShow({';
   //$output .= 'wrapperid: "fadeshow", //ID of blank DIV on page to house Slideshow';
   //$output .= 'dimensions: [400, 450], //width/height of gallery in pixels. Should reflect dimensions of largest image';
   //$output .= 'imagearray: [ ';
   while ($count >= $i) {
      if ($count == $i) {
         $output .= '["'.$planePics[($i-1)][0].'"]
         ';
      } else {
         $output .= '["'.$planePics[($i-1)][0].'"],
         ';
      }
      $i++;
   }
   //$output .= '], ';
   //$output .= "displaymode: {type: 'manual', pause: 2500, cycles: 0, wraparound: false}, ";
   //$output .= 'persist: false, //remember last viewed slide and recall within same session?';
   //$output .= 'fadeduration: 500, //transition duration (milliseconds)';
   //$output .= 'descreveal: "always", ';
   //$output .= 'togglerid: "fadeshowtoggler" ';
   //$output .= '})';
   //$output .= '</script>';

   return $output;
}
?>