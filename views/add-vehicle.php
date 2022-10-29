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
            <h1>Add Vehicle</h1>
            <form method="POST" action="/phpmotors/vehicles/index.php">
             


                    <h3>Note, all feilds are reqired</h3>

                   

                   
                    <label class="top">Car Name<input type="text" name="invMake" required <?php if (isset($invMake)) {
                                                                                                echo "value='$invMake'";
                                                                                            }  ?>> </label>
                    <label class="top">Model <input type="text" name="invModel" required <?php if (isset($invModel)) {
                                                                                            echo "value='$invModel'";
                                                                                        }  ?>></label>
                    <label class="top">Description </label><textarea class="top"  name="invDescription" maxlength="30" required<?php if(isset($invDescription)){echo "value='$invDescription'";}?>></textarea>
                    <span>Not More Than 30 characters</span>
                    <label class="top">Image<input type="text" value="/phpmotors/images/no-image.png" name="invImage" ></label>
                    <label class="top">Thumbnail<input type="text" value="/phpmotors/images/no-image.png" name="invThumbnail" ></label>

                    <label class="top">Price<input type="text" name="invPrice" required pattern="\d+(\.\d{2})?" <?php if (isset($invPrice)) {
                                                                                                                        echo "value='$invPrice'";
                                                                                                                    }  ?>></label>
                    <label class="top">Stock<input type="number" required name="invStock" <?php if (isset($invStock)) {
                                                                                                echo "value='$invStock'";
                                                                                            }  ?>></label>
                    <label class="top">Color<input type="text" required name="invColor" <?php if (isset($invColor)) {
                                                                                            echo "value='$invColor'";}  ?>></label>

                        <br>
                    <label for="carclass" >Car Classification</label>
                    <?php echo $classificationList; ?>
                    <br><br>

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