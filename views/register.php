<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Register | PHP Motors</title>
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
    <h1>Register</h1>

<form method="POST" action="/phpmotors/accounts/index.php">
    <fieldset>
        <legend>Personal Data</legend>

        <h3>Note, all fields are reqired</h3>
        <label class="top">First Name <input type="text" name="clientFirstname"> </label>
        <label class="top">Last Name <input type="text" name="clientLastname"></label>

        <label class="top">Email <input type="email" name="clientEmail" placeholder="someone@gmail.com" required> </label>
        <label class="top">Password
            <input type="password" name="clientPassword" required>
           </label>

  <br>

    <button class="submitBtn">Create Account</button>
    <!-- Add the action name - value pair
    <input type="hidden" name="action" value="register"> -->

    </fieldset>
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