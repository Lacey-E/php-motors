<?php

/* PHPMotors This is the accounts Controller 
        */

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
      $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
      include '../views/login.php';
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

    include '/xampp/htdocs/phpmotors/views/login.php';
    break;

  default:
    include '/xampp/htdocs/phpmotors/views/login.php';
}
