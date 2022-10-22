<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Template PHP Motors</title>
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
            <h1>Add Vehicle</h1>
            <form method="POST" action="/phpmotors/vehicles/index.php">
                <fieldset>
                    <legend>Personal Data</legend>


                    <h3>Note, all feilds are reqired</h3>

                   

                   


                </fieldset>
                <label for="carClassification" >Classification</label>
                    <?php echo $classificationList; ?>

                    <label class="top">Car Name<input type="text" name="invMake"> </label>
                    <label class="top">Model <input type="text" name="invModel"></label>
                    <label class="top">Description <input type="text" name="invDescription"></label>

                    <label class="top">Image<input type="text" value="/phpmotors/images/no-image.png" name="invImage"></label>
                    <label class="top">Thumbnail<input type="text" value="/phpmotors/images/no-image.png" name="invThumbnail"></label>


                    <label class="top">Price<input type="number" name="invPrice"></label>
                    <label class="top">Stock<input type="number" name="invStock"></label>
                    <label class="top">Color<input type="text" name="invColor"></label>

                    

                <button class="submitBtn">Create Vehicle</button>
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="regVehicle">
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