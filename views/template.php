<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Template PHP Motors</title>
  <link rel="stylesheet" href="/php-motors/css/normalize.css">
    <link rel="stylesheet" href="/php-motors/css/style.css">

</head>


  <body>


  <div class="content">
    <header>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/php-motors/commons/header.php';
      ?>
    </header>

    <div class="person">
      <div class="container">
        <div class="container-inner">
          <nav>
            <?php
            require $_SERVER['DOCUMENT_ROOT'] . '/php-motors/commons/nav.php';
            ?>
          </nav>
        </div>
      </div>
    </div>
    <main>
      <h1>Main Content Here</h1>


    </main>

    <hr>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/php-motors/commons/footer.php';
      ?>
    </footer>
    </div>
  </body>


</html>