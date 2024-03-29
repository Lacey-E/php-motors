<?php
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Image Admin PHP Motors</title>
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
      <h1>Image management</h1>

    <h2>Add New Vehicle Image</h2>
<?php
 if (isset($message)) {
  echo $message;
 } ?>

<div class="small-page">
<form  action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
 <label for="invItem" class="top">Vehicle</label>
	<?php echo $prodSelect; ?>
	<fieldset>
		<label class="top">Is this the main image for the vehicle?</label>
		<label for="priYes" class="pImage sub">Yes</label>
		<input type="radio" name="imgPrimary" id="priYes" class="pImage sub" value="1">
		<label for="priNo" class="pImage sub">No</label>
		<input type="radio" name="imgPrimary" id="priNo" class="pImage  top" checked value="0">
	</fieldset>
 <label >Upload Image:</label>
 <input type="file" class="submitBtn" name="file1">
 <input type="submit" class="regbtn submitBtn" value="Upload">
 <input type="hidden" name="action" value="upload">
</form>

<hr>
<br>
<h2>Existing Images</h2>
<p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
<?php
 if (isset($imageDisplay)) {
  echo $imageDisplay;
 } ?>

</div>
    </main>

    <hr>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/commons/footer.php';
      ?>
    </footer>
    </div>
  </body>


</html>
<?php unset($_SESSION['message']); ?>