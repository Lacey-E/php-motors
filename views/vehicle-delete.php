<?php
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($invInfo['invMake'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } ?> | PHP Motors</title>
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
            <h1><?php if (isset($invInfo['invMake'])) {
                    echo "Delete $invInfo[invMake] $invInfo[invModel]";
                } ?></h1>
            <form method="POST" action="/phpmotors/vehicles/index.php">



                <p>Confirm Vehicle Deletion. The delete is permanent.</p>



                <label for="invMake">Vehicle Make</label>
                <input type="text" readonly name="invMake" id="invMake" <?php
                                                                        if (isset($invInfo['invMake'])) {
                                                                            echo "value='$invInfo[invMake]'";
                                                                        } ?>>

                <label for="invModel">Vehicle Model</label>
                <input type="text" readonly name="invModel" id="invModel" <?php
                                                                            if (isset($invInfo['invModel'])) {
                                                                                echo "value='$invInfo[invModel]'";
                                                                            } ?>>

                <label for="invDescription">Vehicle Description</label>
                <textarea name="invDescription" readonly id="invDescription"><?php
                                                                                if (isset($invInfo['invDescription'])) {
                                                                                    echo $invInfo['invDescription'];
                                                                                }
                                                                                ?></textarea>

                <button class="submitBtn">Delete Vehicle</button>
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value="
<?php if (isset($invInfo['invId'])) {
    echo $invInfo['invId'];
} elseif (isset($invId)) {
    echo $invId;
} ?>
">

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