<img class="logo-img" src="/phpmotors/images/site/logo.png" alt="company logo" >
<section class="header-title">

  <?php if (isset($_SESSION['loggedin']))  {
                         if (isset($_SESSION['clientData'])) {
                          $clientFirstname = $_SESSION['clientData']['clientFirstname']?>

                       
                       <a href="/phpmotors/accounts/"> Welcome  
                            <?php echo $clientFirstname; }}?>

                      

                       <br>
                       
                      


                   
                      <!-- <a href="/phpmotors/accounts/?action=admin">Welcome $cookieFirstname</a>-->
                    <!-- </a> <br>  -->
    
    
    
    <h3><?php if (isset($_SESSION['loggedin'])) {
          echo '<a href="/phpmotors/accounts/?action=Logout">
   Log Out</a>';
        } else {
          echo '<a href="/phpmotors/accounts/?action=Login">
  My Account</a>';
        } ?>
    </h3>

    
    
</section>