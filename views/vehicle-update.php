<?php
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}

// Build the classifications option list
$classificationList  = '<select name="classificationId" id="classificationId">';
$classificationList  .= "<option>Choose a Car Classification</option>";
foreach ($classifications as $classification) {
 $classificationList  .= "<option value='$classification[classificationId]'";
 if(isset($classificationId)){
  if($classification['classificationId'] === $classificationId){
   $classificationList .= ' selected ';
  }
 } elseif(isset($invInfo['classificationId'])){
 if($classification['classificationId'] === $invInfo['classificationId']){
  $classificationList  .= ' selected ';
 }
}
$classificationList  .= ">$classification[classificationName]</option>";
}
$classificationList  .= '</select>';


 

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Modify $invMake $invModel";
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
            <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                    echo "Modify $invInfo[invMake] $invInfo[invModel]";
                } elseif (isset($invMake) && isset($invModel)) {
                    echo "Modify $invMake $invModel";
                } ?></h1>
            <form method="POST" action="/phpmotors/vehicles/index.php">



                <h3>Note, all feilds are reqired</h3>




                <label class="top">Car Name<input type="text" name="invMake" required <?php if (isset($invMake)) {
                                                                                            echo "value='$invMake'";
                                                                                        } elseif (isset($invInfo['invMake'])) {
                                                                                            echo "value='$invInfo[invMake]'";
                                                                                        } ?>> </label>
                <label class="top">Model <input type="text" name="invModel" required <?php if (isset($invModel)) {
                                                                                            echo "value='$invModel'";
                                                                                        } elseif (isset($invInfo['invModel'])) {
                                                                                            echo "value='$invInfo[invModel]'";
                                                                                        } ?>></label>
                <label class="top">Description </label><textarea class="top" name="invDescription" maxlength="30" required <?php if (isset($invDescription)) {
                                                                                                                                echo $invDescription;
                                                                                                                            } elseif (isset($invInfo['invDescription'])) {
                                                                                                                                echo $invInfo['invDescription'];
                                                                                                                            } ?>></textarea>
                <span>Not More Than 30 characters</span>
                <label class="top">Image<input type="text" value="/phpmotors/images/no-image.png" name="invImage"></label>
                <label class="top">Thumbnail<input type="text" value="/phpmotors/images/no-image.png" name="invThumbnail"></label>

                <label class="top">Price<input type="text" name="invPrice" required pattern="\d+(\.\d{2})?" <?php if (isset($invPrice)) {
                                                                                                                echo "value='$invPrice'";
                                                                                                            }elseif (isset($invInfo['invPrice'])) {
                                                                                                                echo "value='$invInfo[invPrice]'";
                                                                                                            }  ?>></label>
                <label class="top">Stock<input type="number" required name="invStock" <?php if (isset($invStock)) {
                                                                                            echo "value='$invStock'";
                                                                                        } elseif (isset($invInfo['invStock'])) {
                                                                                            echo "value='$invInfo[invStock]'";
                                                                                        } ?>></label>
                <label class="top">Color<input type="text" required name="invColor" <?php if (isset($invColor)) {
                                                                                        echo "value='$invColor'";
                                                                                    }elseif (isset($invInfo['invColor'])) {
                                                                                        echo "value='$invInfo[invColor]'";
                                                                                    }  ?>></label>

                <br>
                <label for="carclass">Car Classification</label>
                <?php echo $classificationList; ?>
                <br><br>

                <button class="submitBtn">Modify Vehicle</button>
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateVehicle">
                <input type="hidden" name="invId" value="
<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
elseif(isset($invId)){ echo $invId; } ?>
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