<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Add Car Class PHP Motors</title>
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

    <?php
if (isset($message)) {
 echo $message;
}
?>
      
    <form method="POST" action="/phpmotors/vehicles/index.php">
                <fieldset>
                    <legend>Vehicle Data</legend>
                    <label class="top">Vehicle Name<input type="text" name="classificationName"> </label>

                </fieldset>


                <button class="submitBtn">Create Vehicle</button>
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="classificationName">
            </form>

    </main>

    <hr>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/commons/footer.php';
      ?>
    </footer>
    </div>
  </body>


</html>