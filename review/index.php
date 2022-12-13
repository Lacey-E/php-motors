<?php
//This is the Reviews controller

session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors accounts model for use as needed
require_once '../model/vehicles-model.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the functions library
require_once '../library/functions.php';

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
  case 'regReview';
    // FILTER and store the data
    $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // Check For Misssing Data

    if (empty($invId)) {
      $message = '<p class="center"> Unsucessful </p>';
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


  case 'addReview';
    // FILTER and store the data
    $reviewText = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invId = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // Check For Misssing Data

    if (
      empty($reviewText) || empty($invId) || empty($clientId)
    ) {
      $message = '<p class="center"> Please Provide information on all empty field. </p>';
      include '../views/add-review.php';
      exit;
    }

    //  Send The Data To The Model If No ERRors Exist

    $reviewOutcome = reviewPush(
      $reviewText,
      $invId,
      $clientId
    );


    if ($reviewOutcome) {
      $message = "<p> Review submitted Sucessful </p>";
      include '../views/add-review.php';
      exit;
    } else {
      $message =  "<p> Sorry,review submission failed, please try again </p>";
      include '../views/add-review.php';
      exit;
    }

    break;



  case 'getReviewItems':
    // Get the classificationId 
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
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
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    if (
      empty($classificationId) || empty($invMake) || empty($invModel)
     
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
    $reviewId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $reviewInfo = getReviewInfo($reviewId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../views/review-delete.php';
    exit;
    break;

  case 'deleteReview':
    $reviewId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    $reviewText = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    

    $deleteResult = deleteReview($reviewId);
    if ($deleteResult) {
      $message = "<p class='notice'>Congratulations review was	successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/review/');
      exit;
    } else {
      $message = "<p class='notice'>Error: review was not
          deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/review/');
      exit;
    }
    break;

    case 'delivervehicleDetail':
      $reviewId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
      
      // Get single vehicle
      $vehicle = getInvItemInfo($invId);
  
      if (empty($vehicle)) {
        $_SESSION['message'] = $message;
        $message = "<p class='notice'>Sorry, Item could be found.</p>";
       
       
      } else {
        $page_title = $vehicle['invMake'] . ' ' . $vehicle['invModel']; 
        $vehicleDisplay = buildSingleVehicleDisplay($vehicle);
      }
    
      include '../views/vehicle-detail.php';
      break;

  default:
    $classificationList = buildClassificationList($classifications);

    include '/xampp/htdocs/phpmotors/views/vehicle-management.php';
}


?>