<?php
// If the user is not logged in redirect to the login page...
if (!$_SESSION['loggedin']) {
    header('Location: /phpmotors/');}?><!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> My Accounts</title>
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
            if (isset($_SESSION['$message'])) {
                echo $message;
            }
            ?>    
            <h1><?php if (isset($_SESSION['clientData'])) {
                    $clientFirstname = $_SESSION['clientData']['clientFirstname'];
                    $clientLastname = $_SESSION['clientData']['clientLastname'];
                    echo "<span>$clientFirstname $clientLastname : Logged in</span>";
                } ?> </h1>
            <?php
            $clientId = $_SESSION['clientData']['clientId'];
            $clientFirstname = $_SESSION['clientData']['clientFirstname'];
            $clientLastname = $_SESSION['clientData']['clientLastname'];
            $clientEmail = $_SESSION['clientData']['clientEmail'];
            $clientLevel = $_SESSION['clientData']['clientLevel'];
            echo '<ul><li>Client ID: ' . $clientId . '</li>
<li>First Name: ' . $clientFirstname . '</li>
<li>Last Name: ' . $clientLastname . '</li>
<li>Email: ' . $clientEmail . '</li>
</ul>'
            ?>
           
           <br>
           <br>
           
          
            <?php
                if ($clientLevel > 1) {
                    echo ' <p>Click Below to acess the Inventory</p>
                   <a href="/phpmotors/vehicles/?action=default">
                    Vehicle Management</a>';
                } ?>

           



        </main>
        <hr>

        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/commons/footer.php';
            ?>
        </footer>

    </div>
</body>


</html>