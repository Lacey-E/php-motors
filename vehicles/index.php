<?php

// /* PHPMotors This is the VEHICLES CONTROLLER
//         */

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors accounts model for use as needed
require_once '../model/vehicles-model.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';



$classifications = getClassifications();

$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
  $navList .= "<li><a href='/phpmotors/vehicles?action=classification&classificationName="
    . urlencode($classification['classificationName']) .
    "' title='View our $classification[classificationName] 
 product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

//Build classification list
 $classificationList = '<select name="classificationId" id="classificationList">';
//  $classificationList .= "<option> Choose car Class</option>";
 foreach ($classifications as $classification) {
  $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
 }
 $classificationList .='</select>';


 $action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }


switch ($action) {
  case 'classificationName';
    // FILTER and store the data
    $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // Check For Misssing Data

    if (empty($classificationName)) {
      $message = '<p class="center"> Please Provide information on all empty field. </p>';
      include '../views/add-classification.php';
      exit;
    };

    //  Send The Data To The Model If No ERRors Exist

    $carOutcome = regCar($classificationName);

    if ($carOutcome === 1) {

      header('Location: /phpmotors/vehicles/');
    
    } else {
      $message =  "<p> Sorry $classificationName, The registration failed, please try again </p>";
      include '../views/add-classification.php';
      exit;
    }

    break;


    case 'regVehicle';
    // FILTER and store the data
    $invMake = filter_input(INPUT_POST, 'invMake');
    $invModel = filter_input(INPUT_POST, 'invModel');
    $invDescription = filter_input(INPUT_POST, 'invDescription');
    $invImage = filter_input(INPUT_POST, 'invImage');
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
    $invPrice = filter_input(INPUT_POST, 'invPrice');
    $invStock = filter_input(INPUT_POST, 'invStock');
    $invColor = filter_input(INPUT_POST, 'invColor');
    $classificationId = filter_input(INPUT_POST, 'classificationId');
   
    // Check For Misssing Data

    if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) ||
    empty($invStock) || empty($invColor) || empty($classificationId)){
      $message = '<p class="center"> Please Provide information on all empty field. </p>';
      include '../views/add-vehicle.php';
      exit;
    }

    //  Send The Data To The Model If No ERRors Exist

    $vehOutcome = vehicleRegister(
      $invMake,
      $invModel,
      $invDescription,
      $invImage,
      $invThumbnail,
      $invPrice,
      $invStock,
      $invColor,
      $classificationId
    );


    if($vehOutcome){
      $message = "<p> Car Registration Sucessful </p>";
      include '../views/add-vehicle.php';
      exit;
    } else {
      $message =  "<p> Sorry, The registration failed, please try again </p>";
      include '../views/registration.php';
      exit;
    }

    break;


    //  case 'vehicle-manag';
    //  include '/xampp/htdocs/phpmotors/views/vehicle-management.php';

    // break;

        default:
        include '/xampp/htdocs/phpmotors/views/vehicle-management.php';
    }


  
