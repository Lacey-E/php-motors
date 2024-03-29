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

      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <form method="post" action="/phpmotors/accounts/index.php">


        <form method="POST" action="/phpmotors/accounts/index.php">
          <fieldset>
            <legend>Personal Data</legend>

            <h3>Note, all fields are reqired</h3>
            <label class="top">First Name <input type="text" name="clientFirstname" <?php if (isset($clientFirstname)) {
                                                                                      echo "value='$clientFirstname'";
                                                                                    }  ?> required> </label>
            <label class="top">Last Name <input type="text" name="clientLastname" <?php if (isset($clientLastname)) {
                                                                                    echo "value='$clientLastname'";
                                                                                  }  ?> required></label>

            <label class="top">Email <input type="email" name="clientEmail" placeholder="someone@gmail.com" <?php if (isset($clientEmail)) {
                                                                                                              echo "value='$clientEmail'";
                                                                                                            }  ?> required> </label>
            <label class="top">Password

              <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
              <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
            </label>

            <br>
            <input type="submit" name="submit" id="regbtn" value="Register">
            <!-- <button class="submitBtn">Create Account</button> -->
            <!-- Add the action name - value pair-->
            <input type="hidden" name="action" value="register">

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