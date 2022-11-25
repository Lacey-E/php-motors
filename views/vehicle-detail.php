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
                </section>
                <?php } ?>

           
    </main>

    <hr>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/commons/footer.php';
      ?>
    </footer>
    </div>
  </body>


</html>