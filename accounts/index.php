<?php

/* PHPMotors This is the accounts Controller 
        */

        session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the PHP Motors model for use as needed
require_once '../model/accounts-model.php ';
// Get the functions library
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

$navList = nav($classifications);


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'register';
    // Filter and store the data
    $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    //Special filter for Password and email to filter for extra code 
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

    $existingEmail = checkExistingEmail($clientEmail);

    // Check for existing email address in the table
    if($existingEmail){
     $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
     include '/xampp/htdocs/phpmotors/views/login.php';
     exit;
    }


    // Check for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '/xampp/htdocs/phpmotors/views/register.php';
      exit;
    }

    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

    // Check and report the result
    if ($regOutcome === 1) {
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
      $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
      header('Location: /phpmotors/accounts/?action=Login');
      exit;
    } else {
      $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '/xampp/htdocs/phpmotors/views/register.php';
      exit;
    }

    break;

  case 'Login';
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    //Special filter for Password and email to filter for extra code 
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);


    // Check for missing data
    if (empty($clientEmail) || empty($checkPassword)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '/xampp/htdocs/phpmotors/views/login.php';
      exit;
    }

    // A valid password exists, proceed with the login process
// Query the client data based on the email address
$clientData = getClient($clientEmail);
// Compare the password just submitted against
// the hashed password for the matching client
$hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
// If the hashes don't match create an error
// and return to the login view
if(!$hashCheck) {
  $message = '<p class="notice">Please check your password and try again.</p>';
  include '/xampp/htdocs/phpmotors/views/login.php';
  exit;
}
// A valid user exists, log them in
$_SESSION['loggedin'] = TRUE;
// Remove the password from the array
// the array_pop function removes the last
// element from an array
array_pop($clientData);



// Store the array into the session
$_SESSION['clientData'] = $clientData;

// Send them to the admin view
include '/xampp/htdocs/phpmotors/views/admin.php';
exit;


case 'admin':
  include '/xampp/htdocs/phpmotors/views/admin.php';
  break;
case 'login':
  include '../view/login.php';
  break;

case 'Logout':
  session_destroy();
  unset($_SESSION['clientData']);
  header('Location: /phpmotors/');
  exit;
  break;


  default:
  include '/xampp/htdocs/phpmotors/views/admin.php';
}
