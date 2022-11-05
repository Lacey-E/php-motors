<img class="logo-img" src="/phpmotors/images/site/logo.png" alt="company logo" >
<section class="header-title">
  <h3 class="phrase">
 <a href="/phpmotors/accounts/?action=login">My Account </a></h3>
    <span>
    <?php if(isset($cookieFirstname)){
 echo "<span>Welcome $cookieFirstname</span>";
} ?>
    </span>
    
</section>