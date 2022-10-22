<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Vehicle Management</title>
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
    <h1>Vehicle Management</h1>

    <?php
if (isset($message)) {
 echo $message;
}
?>

<ul>
<li> <a href="/phpmotors/vehicles/?action=classificationName">Add classification</a></li>
       <li> <a href="/phpmotors/vehicles/?action=regVehicle">Add Vehichle</a></li>
</ul>

    </main>

    <hr>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/commons/footer.php';
      ?>
    </footer>
    </div>
  </body>


</html>