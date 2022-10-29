<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> My Account | PHP Motors</title>
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
    <form method="post" action="/phpmotors/accounts/index.php">
                <fieldset>
                    <legend>Log in Data</legend>


                    <label class="top">Email* <input type="email" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required> </label>
                    <label class="top">Password* <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
              <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span></label>


                    
                    <br>
                    <button class="submitBtn">Log in</button>
                    <input type="hidden" name="action" value="Login">
                    
                    
    

                    <h3>No account? <a href="/phpmotors/accounts/?action=register">Sign Up Here</a></h3>
                    
                    
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