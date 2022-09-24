<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Php Motors</title>
    <link rel="stylesheet" href="/php-motors/css/style.css">
    <link rel="stylesheet" href="/php-motors/css/normalize.css">
</head>


<body>

    <div class="content">

        <header>

            <?php require $_SERVER['DOCUMENT_ROOT'] . '/php-motors/commons/header.php';
            ?>
        </header>

        <div class="person">
            <div class="container">
                <div class="container-inner">
                    <nav>
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/php-motors/commons/nav.php';
            ?> 
                    </nav>
                </div>
            </div>
        </div>

        <main>


            <h2>Welcome To PHP Motors!</h2>

            <div class="car-content">

                <p>
                    DMC Delorean
                </p>

                <p>
                    3 cup holders <br> supream doors <br> Fuzzy dice!

                </p>

                <button class="sign-button"> Own Today </button>


                <div class="hero-ph">
                    <picture class="hero-ph">
                        <source media="(max-width: 500px)" srcset="/php-motors/images/site/car.jpg" />
                        <source media="(max-width: 900px)" srcset="/php-motors/images/site/car2.jpg" />
                        <source media="(max-width: 1600px)" srcset="/php-motors/images/delorean.jpg" />
                        <img src="/php-motors/images/delorean.jpg" alt="halo-image" />
                    </picture>
                </div>

            </div>



            <div class="lower-page">

                <div class="review">

                    <h3>DMC Delorean Reviews</h3>

                    <p>• "So fast its almost like travelling in time" (4/5) <br>
                        • "Coolest ride on the road." [4/5] <br>
                        • "I'm Feeling like Marty Mcfly!" (4/5)
                    </p>

                </div>


                <div class="upgradese">
                    <h2>Delorean upgradeses</h2>
                    <div class="day-image">
                        <div class="flex">

                            <div class="flex-col">
                                <span class="col-head" id="week1"></span>
                                <img id="img1" src="/php-motors/images/upgrades/hub-cap.jpg" alt="hub cap" />
                                <h3>Hub cap</h3>
                            </div>

                            <div class="flex-col">
                                <span class="col-head" id="week2"></span>
                                <img id="img2" src="/php-motors/images/upgrades/bumper_sticker.jpg" alt="bumper sticker" />
                                <h3>Bumper</h3>
                            </div>

                            <div class="flex-col">
                                <span class="col-head" id="week3"></span>
                                <img id="img3" src="/php-motors/images/upgrades/flame.jpg" alt="flame" />
                                <h3>Flame</h3>
                            </div>

                            <div class="flex-col">
                                <span class="col-head" id="week4"></span>
                                <img id="img4" src="/php-motors/images/upgrades/flux-cap.png" alt="flux cap" />
                                <h3>Flux Cap</h3>
                            </div>


                        </div>
                    </div>


                </div>



            </div>













        </main>












        <hr>





        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/php-motors/commons/footer.php';?>
        </footer>



    </div>
</body>

</html>