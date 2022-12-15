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
// 
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
  case 'review':
    include '../views/vehicle-detail.php';
    break;

  case 'editReview';
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
    $reviewInfo = getReviewInfo($reviewId);
    
    $clientFirstname = $_SESSION['clientData']['clientFirstname'];
    $clientLastname = $_SESSION['clientData']['clientLastname'];
    include '../views/update-review.php';
    break;
    
    
  case 'del':
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
    $reviewInfo = getReviewInfo($reviewId);
    $message = var_dump($reviewId);
    $reviewText = $reviewInfo['reviewText'];
    $invId = $reviewInfo['invId'];
    $clientId = $reviewInfo['clientId']; 
    $clientFirstname = $_SESSION['clientData']['clientFirstname'];
    $clientLastname = $_SESSION['clientData']['clientLastname'];
  

    include '../views/review-delete.php';
    break;


  case 'addReview';
    // FILTER and store the data
    $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT));
    $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));

    // Check For Misssing Data

    if (
      empty($reviewText) || empty($invId) || empty($clientId)
    ) {
      $message = '<p class="center"> Please Provide information on all empty field. <br>Text : '. $reviewText . '<br>inv: ' . $invId . '<br>client: ' . $clientId . '</p>';
      include '../views/add-review.php';
      exit;
    }

    //  Send The Data To The Model If No ERRORS Exist

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


  case 'updateReview':
    $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
    $reviewText= trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    $reviewInfo = getReviewInfo($reviewId);
    $clientFirstname = $_SESSION['clientData']['clientFirstname'];
    $clientLastname = $_SESSION['clientData']['clientLastname'];


    if (
      empty($reviewText)
     
    ) {
      $message = '<p>Please complete all information for the item!</p>';
      include '../views/update-review.php';
      exit;
    }
   

    $reviewUpdate = updateReview($reviewId, $reviewText);
    if ($reviewUpdate) {
      $message = "<p class='notice'>Congratulations, Review was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/accounts/');
      exit;
    } else {
      $message = "<p class='notice'>Error. the review was not updated.</p>";
      include '../views/update-review.php';
      exit;
    }
    break;


  case 'deleteReview':
    $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
    $reviewInfo = getReviewInfo($reviewId);
    
  $reviewText = $reviewInfo['reviewText'];
  $invId = $reviewInfo['invId'];
  $clientId = $reviewInfo['clientId']; 
  $clientFirstname = $_SESSION['clientData']['clientFirstname'];
  $clientLastname = $_SESSION['clientData']['clientLastname'];
  

    $deleteResult = deleteReview($reviewId);

    if ($deleteResult) {
      $message = "<p class='notice'>Congratulations review was	successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/accounts/');
      exit;
    } else {
      $message = "<p class='notice'>Error: review was not
          deleted.</p>";
      $_SESSION['message'] = $message;
      include '../views/review-delete.php';
      exit;
    }
    break;

   

  default:
  if ($loggedin) {
    header('location: /phpmotors/view/admin.php');
    exit;
} else {
    header('location: /phpmotors/index.php');
    exit;
}

}


?>