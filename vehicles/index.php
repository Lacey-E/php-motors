<?php

// /* PHPMotors This is the VEHICLES CONTROLLER
//         */

session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors accounts model for use as needed
require_once '../model/vehicles-model.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the review 
require_once '../model/review-model.php';
// Get the array of classifications


$classifications = getClassifications();

$navList = nav($classifications);




//Build classification list
$classificationList = '<select name="classificationId" id="classificationList">';
//  $classificationList .= "<option> Choose car Class</option>";
foreach ($classifications as $classification) {
  $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
}
$classificationList .= '</select>';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
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
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_ALLOW_FRACTION));
    $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // Check For Misssing Data

    if (
      empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) ||
      empty($invStock) || empty($invColor) || empty($classificationId)
    ) {
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


    if ($vehOutcome) {
      $message = "<p> Car Registration Sucessful </p>";
      include '../views/add-vehicle.php';
      exit;
    } else {
      $message =  "<p> Sorry, The registration failed, please try again </p>";
      include '../views/registration.php';
      exit;
    }

    break;



  case 'getInventoryItems':
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId);
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray);
    break;

  case 'mod':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '/xampp/htdocs/phpmotors/views/vehicle-update.php';
    exit;
    break;

  case 'updateVehicle':
    $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    if (
      empty($classificationId) || empty($invMake) || empty($invModel)
      || empty($invDescription) || empty($invImage) || empty($invThumbnail)
      || empty($invPrice) || empty($invStock) || empty($invColor)
    ) {
      $message = '<p>Please complete all information for the item! Double check the classification of the item.</p>';
      include '../view/vehicle-update.php';
      exit;
    }

    $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
    if ($updateResult) {
      $message = "<p class='notice'>Congratulations, the $invMake $invModel was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p class='notice'>Error. the $invMake $invModel was not updated.</p>";
      include '../views/vehicle-update.php';
      exit;
    }
    break;

  case 'del':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../views/vehicle-delete.php';
    exit;
    break;

  case 'deleteVehicle':
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    $deleteResult = deleteVehicle($invId);
    if ($deleteResult) {
      $message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p class='notice'>Error: $invMake $invModel was not
          deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    }
    break;
  case 'classification':
    $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $vehicles = getVehiclesByClassification($classificationName);
    if (!count($vehicles)) {
      $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
    } else {
      $vehicleDisplay = buildVehiclesDisplay($vehicles);
    }
    include '../views/classification.php';
    break;

    // case 'getVehicleReview':
    //   $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
    //   $reviews = getReviewById($invId);
    //   if (!count($reviews)) {
    //     $message = "<p class='notice'>Be the first to leave a Review</p>";
    //   } else {
    //     $reviewDisplay = buildReviewDisplay($reviews);
    //   }
    //   include '../views/vehicle-detail.php';


    //   break;

    case 'delivervehicleDetail':
      $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
      
      $reviews = getReviewById($invId);
      if (!count($reviews)) {
        $reviewDisplay = "<p class='notice'>No Review Yet, Be the first to leave a Review</p>";
      } else {
        $reviewDisplay = buildReviewDisplay($reviews);
      }
      // Get single vehicle
      $vehicle = getInvItemInfo($invId);
      //GET SINGLE Review
      $reviewInfo = getReviewInfo($invId);
  
      if (empty($vehicle )) {
        $_SESSION['message'] = $message;
        $message = "<p class='notice'>Sorry, Item could be found.</p>";
      
      } 
      
      else {
        $page_title = $vehicle['invMake'] . ' ' . $vehicle['invModel']; 
        $vehicleDisplay = buildSingleVehicleDisplay($vehicle, $reviewInfo);
      }
    
      include '../views/vehicle-detail.php';
      break;

  default:
    $classificationList = buildClassificationList($classifications);

    include '/xampp/htdocs/phpmotors/views/vehicle-management.php';
}
