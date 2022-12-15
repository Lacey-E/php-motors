<?php
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Vehicle | PHP Motors</title>
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

            
            <h1>Add Review</h1>
            <form method="POST" action="/phpmotors/review/index.php">
            
                

                            
                

                <input type="hidden" name="invId" <?php  "value='$invId'"; ?>>
                <input type="hidden" name="clientId" <?php  "value='$clientId'"; ?>>
               
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addReview">
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