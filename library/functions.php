<?php


//Check email to filter 
function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
   }

   // Check for password 
   function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
   }

   
   function nav($classifications)
   {
      $classifications = getClassifications();
      $navList = '<ul>';
      $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
      foreach ($classifications as $classification) {
         $navList .= "<li><a href='/phpmotors/vehicles?action=classification&classificationName="
            . urlencode($classification['classificationName']) .
            "' title='View our $classification[classificationName] 
           product line'>$classification[classificationName]</a></li>";
      }
      $navList .= '</ul>';
      return $navList;
   }















?>