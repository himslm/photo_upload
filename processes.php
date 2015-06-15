<?php
if(isset($_GET['add_photos'])){
  include("includes/configuration.php");
  $photo = new photo();
  $simpleImage = new simpleImage();
  $example->addPhotos($_POST['gallery_ID'], $photo, $simpleImage);
}
?>
