<?php
// If the user is not logged in redirect to the login page...
if (!$_SESSION['loggedin']) {
    header('Location: /phpmotors/');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Client Update | PHP Motors</title>
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
            <h1>Account Update</h1>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            ?>

            <?php
            $clientId = $_SESSION['clientData']['clientId'];
            $clientFirstname = $_SESSION['clientData']['clientFirstname'];
            $clientLastname = $_SESSION['clientData']['clientLastname'];
            $clientEmail = $_SESSION['clientData']['clientEmail'];
            // $clientPassword = $_SESSION['clientData']['clientPassword']
            ?>

            <form method="post" action="/phpmotors/accounts/index.php">
               

              
                <fieldset>
                    <h3>Change Password</h3>
                    <p>This action will Change your previous password
                    <p>

                        <label class="top">Password* <input type="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><span>Passwords must be at least 8 characters
                                and contain at least 1 number, 1 capital letter and 1 special character.</span>
                        </label>

                        <br>
                        <button class="submitBtn">Change Password</button>
                        <input type="hidden" name="action" value="updatePasssword">
                        <input type="hidden" name="clientId" value="
<?php echo $_SESSION['clientData']['clientId'] ?>">

                </fieldset>
            </form>

            <hr>

            <br>

            <hr>
            <br>



            <form class="otherForm" method="POST" action="/phpmotors/accounts/index.php">
                <fieldset>
                    <h3>Change Bio</h3>

                    <h4>Note, all feilds are reqired</h4>
                    <label class="top">First Name <input type="text" name="clientFirstname" required <?php if (isset($clientFirstname)) {
                                                                                                            echo $clientFirstname;
                                                                                                        } elseif (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                                                            echo $_SESSION['clientData']['clientFirstname'];
                                                                                                        } ?>></label>
                    <label class="top">Last Name <input type="text" name="clientLastname" required <?php if (isset($clientLastname)) {
                                                                                                        echo $clientLastname;
                                                                                                    } elseif (isset($_SESSION['clientData']['clientLastname'])) {
                                                                                                        echo $_SESSION['clientData']['clientLastname'];
                                                                                                    } ?>></label>

                    <label class="top">Email <input type="email" name="clientEmail" required <?php if (isset($clientEmail)) {
                                                                                                    echo $clientEmail;
                                                                                                } elseif (isset($_SESSION['clientData']['clientEmail'])) {
                                                                                                    echo $_SESSION['clientData']['clientEmail'];
                                                                                                } ?>></label>

                </fieldset>

                <button class="submitBtn">Update Bio Info</button>
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateAccount">
                <!-- <input type="hidden" name="action" value="updateVehicle"> -->
                <input type="hidden" name="clientId" value=" <?php echo $_SESSION['clientData']['clientId'];
                                                                ?>">

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