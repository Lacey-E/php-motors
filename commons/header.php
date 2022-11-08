<img class="logo-img" src="/phpmotors/images/site/logo.png" alt="company logo" >
<section class="header-title">
  <a class="phrase" href="/phpmotors/accounts/">
  <?php if (isset($_SESSION['loggedin']))  {
                         if (isset($_SESSION['clientData'])) {
                          $clientFirstname = $_SESSION['clientData']['clientFirstname']?>

                       
                       <a href="/phpmotors/accounts/"> Welcome  
                            <?php echo $clientFirstname; }}?>

                       </a>

                       <br>
                       
                      


                   
                      <!-- <a href="/phpmotors/accounts/?action=admin">Welcome $cookieFirstname</a>-->
                    <!-- </a> <br>  -->
    
    
    
    <span><?php if (isset($_SESSION['loggedin'])) {
          echo '<a href="/phpmotors/accounts/?action=Logout">
   Log Out</a>';
        } else {
          echo '<a href="/phpmotors/accounts/?action=Login">
  My Account</a>';
        } ?>
    </span>

    
    
</section>