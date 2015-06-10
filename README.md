# photo_upload
A Photo Upload Class with Resize Capabilities using SimpleImage.php
-------------------------------------------------------------------------------
To use in OOP format:
Example:

if(isset($_GET['add_photos'])){ \r\n
  $photo = new photo();
  $simpleImage = new simpleImage();
  $class->addPhotos($photo, $simpleImage);
}

class example{
  function addPhotos($photo, $simpleImage){
    $count = count($_FILES['photo']['name']) - 1;
    for($i = 0; $i <= $count; $i++){
      $photo->addPhoto($_FILES['photo']['name'][$i], $_FILES['photo']['tmp_name'][$i], $simpleImage, 'relative-path/to/photo-directory/', 500); //last Argument is how long you want the max length (width/height) to be.
    }
  }
}
-------------------------------------------------------------------------------
