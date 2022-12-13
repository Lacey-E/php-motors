<?php

function reviewPush($reviewText, $invId, $clientId){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
 // The SQL statement
 $sql = 'INSERT INTO review (reviewText, invId, clientId)
     VALUES (:reviewText, :invId, :clientId)';
 // Create the prepared statement using the phpmotors connection
 $stmt = $db->prepare($sql);
 // and tells the database the type of data it is
 $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
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


   //Delete Review
   function deleteReview($reviewId) {
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM review WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
   }


?>