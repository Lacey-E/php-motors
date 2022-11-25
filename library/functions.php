<?php
// Creating a the Nav 
function checkEmail($clientEmail)
{
   $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
   return $valEmail;
}



function checkPassword($clientPassword){
   $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
   return preg_match($pattern, $clientPassword);
};

function checkDecimal($invPrice)
{
   $valDecimal = filter_var($invPrice, FILTER_FLAG_ALLOW_FRACTION);
   return $valDecimal;
}

function checkPrice($invPrice){
   $pattern = '\d+(\.\d{2})?';
   return preg_match($pattern, $invPrice);
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
// displays a list of vehicle in an unordered list
function buildVehiclesDisplay($vehicles){
   $dv = '<ul id="inv-display">';
   foreach ($vehicles as $vehicle) {
    $dv .= '<li>';
    $dv .= '<a href="/phpmotors/vehicles/?action=delivervehicleDetail&' . $vehicle['invId']. '">';
    $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
    $dv .= '<hr>';
    $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
    $dv .= '</a>';
    $dv .= '<span> $' . number_format ($vehicle['invPrice']) . '</span>';
    $dv .= '</li>';
   }
   $dv .= '</ul>';
   return $dv;
  }

  function buildSingleVehicleDisplay($vehicle){
   $svd = '<section id="vehicle-display">';
   $svd .= "<h1>$vehicle[invMake] $vehicle[invModel]<h1>";
   $svd .= '<div>';
   $svd .= "<img src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com' id='mainImage'>";
   $svd .= '<h2> Price: $' . number_format ($vehicle['invPrice']) . '</h2>';
   $svd .= '</div>';
   $svd .= '<hr>';
   $svd .= "<h3>$vehicle[invMake] $vehicle[invModel] Details </h3>";
   $svd .= '<ul id="vehicle-details">';
   $svd .= "<li> $vehicle[invDescription]</li>";
   $svd .= "<li> <h4>Colour: </h4> $vehicle[invColor]</li>";
   $svd .= "<li> <h4># in Stock: </h4> $vehicle[invStock]</li>";
   $svd .= '</ul>';
   $svd .= '</section>';
   return $svd; 
  }

 

  // Build images display for image management view
function buildImageDisplay($imageArray) {
   $id = '<ul id="image-display">';
   foreach ($imageArray as $image) {
    $id .= '<li>';
    $id .= "<img src='$image[imgPath]' title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
    $id .= "<p><a href='/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
    $id .= '</li>';
  }
   $id .= '</ul>';
   return $id;
  }

  

  ?>