<?php ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(-1) ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Details PHP Motors</title>
  <link rel="stylesheet" href="/phpmotors/css/normalize.css">
  <link rel="stylesheet" href="/phpmotors/css/style.css">

</head>


<body>


  <div class="content">
    <header>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/commons/header.php';
      ?>
    </header>

    <div class="person">
      <div class="container">
        <div class="container-inner">
          <nav>
            <?php
            echo $navList;
            ?>
          </nav>
        </div>
      </div>
    </div>
    <main>
      <?php if (isset($message)) {
        echo $message;
      }
      ?>


      <?php if (!empty($vehicle)) { ?>
        <section id="vehicle-display">
          <h1><?php echo $vehicle['invMake'] . ' ' . $vehicle['invModel'] ?></h1>
          <div>
            <img class="image-size" src='<?php echo $vehicle['invImage'] ?>' alt='Image of <?php echo $vehicle['invMake'] . ' ' . $vehicle['invModel'] ?> on phpMotors' id='mainImage'>
            <h2>Price: $ <?php echo number_format($vehicle['invPrice']) ?></h2>

            <p style="color:blue; font-size:20px">Description:</p>
            <p style="text-align: center; width: 300px"><?php echo $vehicle['invDescription'] ?></p>

          </div>
          <hr>
          <h3><?php echo $vehicle['invMake'] . ' ' . $vehicle['invModel'] ?> Details</h3>
          <ul id="vehicle-details">
            <li>
              <h4>Colour:</h4> <?php echo $vehicle['invColor'] ?>
            </li>
            <li>
              <h4># in Stock:</h4> <?php echo $vehicle['invStock'] ?>
            </li>
          </ul>

          <br>


        </section>
      <?php } ?>





      <br>
      <h2 style="text-decoration:underline; color:blue;">Existing Customers Reviews</h2>
      
      <?php
        echo $reviewDisplay;
       
        ?>
      <div>
       
        <br>
       
       

        <?php


        // If the user is not logged in redirect to the login page...
        if ($_SESSION['loggedin'] == false) {
          echo '<a href="/phpmotors/accounts/?action=Login">You need to login to Leave a review</a>';
        } else {
          $_SESSION['clientData'];
          $clientFirstname = $_SESSION['clientData']['clientFirstname'];
          $clientLastname = $_SESSION['clientData']['clientLastname'];
          $clientId = $_SESSION['clientData']['clientId'];
          $shortName = substr($clientFirstname, 0, 1);
          $newName = $shortName . $clientLastname;



        ?>
          <form method="POST" action="/phpmotors/review/index.php">
            <fieldset>
              <legend>Leave A review</legend>
              <label class="top">Name<input type="text" <?php echo "value='$newName'"; ?> disabled></label>
              <br>

              <textarea name="reviewText" placeholder="Type Review" required><?php if (isset($reviewText)) {
                                                                                echo $reviewText;
                                                                              } ?></textarea>
              <input type="hidden" name="invId" <?php echo "value='$invId'"; ?>>
              <input type="hidden" name="clientId" <?php echo "value='$clientId'"; ?>> <br> <br>
              <br>
              <button class="submitBtn">Add Review</button>
              <!-- Add the action name - value pair -->
              <input type="hidden" name="action" value="addReview">
            </fieldset>
          </form>
        <?php

        }
        ?>








        <br>
        <br>
        <br>
        <br>
        <br><br><br>
      </div>




    </main>

    <hr>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/commons/footer.php';
      ?>
    </footer>
  </div>
</body>


</html>