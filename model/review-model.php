<?php

function reviewPush($revDescription, $displayName, $invId, $clientId){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
 // The SQL statement
 $sql = 'INSERT INTO review (revDescription, displayName, invId, clientId)
     VALUES (:revDescription, :displayName, :invId, :clientId)';
 // Create the prepared statement using the phpmotors connection
 $stmt = $db->prepare($sql);
 // and tells the database the type of data it is
 $stmt->bindValue(':description', $revDescription, PDO::PARAM_STR);
 $stmt->bindValue(':displayName', $displayName, PDO::PARAM_STR);
 $stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
 $stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);

 // Insert the data
 $stmt->execute();
 // Ask how many rows changed as a result of our insert
 $rowsChanged = $stmt->rowCount();
 // Close the database interaction
 $stmt->closeCursor();
 // Return the indication of success (rows changed)
 return $rowsChanged;

}

// Get review information by reviewId
function getReviewInfo($reviewId){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM review WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $reviewInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviewInfo;
   }

?>