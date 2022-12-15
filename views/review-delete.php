<?php
if (!$_SESSION['loggedin']) {
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

            $screenName = substr($clientFirstname, 0 , 1) . $clientLastname;  
            ?>
            <h1>delete</h1>
                    
            <form method="POST" action="/phpmotors/review/index.php"> 
                <h3>Delete cannot be undone</h3>
                <label for="">Screen Name: <input type="text" value=" <?php echo $screenName ?>" disabled> </label>
                                                                                                        

                <textarea class="top" name="reviewText" id="reviewText" disabled><?php if(isset($reviewText)){ echo $reviewText;}elseif(isset($reviewInfo['reviewText'])){echo $reviewInfo['reviewText']; }?></textarea>
                <br>
               <br>
              <br>

                <button class="submitBtn">Delete Review</button>
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="deleteReview">
                <input type="hidden" name="reviewId" value="
<?php if(isset($reviewInfo['reviewId'])){ echo $reviewInfo['reviewId'];} 
elseif(isset($reviewId)){ echo $reviewId; } ?>
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