<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
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
    <h1> <?php echo $classificationName; ?> Vehicles</h1>

<?php if (isset($message)) {
    echo $message;
}
?>
<?php if (!empty($vehicles)) { ?>

        <ul id="inv-Display">
                    <?php foreach ($vehicles as $vehicle) { ?>
                        <li>
                    <a href="/phpmotors/vehicles/?action=delivervehicleDetail&invId=<?php echo $vehicle['invId']?>">
                    <img src='<?php echo $vehicle['invThumbnail'] ?>' alt='Image of <?php echo $vehicle['invMake']?> on phpMotors'></a>
                    <hr>

                   <h2><a href="/phpmotors/vehicles/?action=delivervehicleDetail&invId=<?php echo $vehicle['invId']?>"><?php echo $vehicle['invMake'] . ' ' . $vehicle['invModel'] ?></a></h2>
               
                    <?php echo  '<span> $' . number_format ($vehicle['invPrice']) . '</span>'; ?>
                    </li> 
                    <?php } ?>
                </ul>
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