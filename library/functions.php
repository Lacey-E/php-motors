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

   // Build the classifications select list 
function buildClassificationList($classifications){ 
   $classificationList = '<select name="classificationId" id="classificationList">'; 
   $classificationList .= "<option>Choose a Classification</option>"; 
   foreach ($classifications as $classification) { 
    $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
   } 
   $classificationList .= '</select>'; 
   return $classificationList; 
  }


  // Get vehicles by classificationId 
function getInventoryByClassification($classificationId){ 
   $db = phpmotorsConnect(); 
   $sql = ' SELECT * FROM inventory WHERE classificationId = :classificationId'; 
   $stmt = $db->prepare($sql); 
   $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT); 
   $stmt->execute(); 
   $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC); 
   $stmt->closeCursor(); 
   return $inventory; 
  }















?>