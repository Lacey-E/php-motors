<?php

/* PHPMotors Main Controller
         * This file is accessed at http://lvh.me/phpmotors/
         
        */

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';

require_once 'library/functions.php';


// Get the array of classifications
$classifications = getClassifications();


$navList = nav($classifications);

// Build a navigation bar using the $classifications array


// echo $navList;
// exit;


$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action){
    case 'template':
     
     break;
    
    default:
     include '/xampp/htdocs/phpmotors/views/home.php';
   }








   // echo "<pre>";
// var_dump($classifications);
// echo "</pre>";
// exit;
?>