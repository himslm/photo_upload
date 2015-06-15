<?php
class gallery extends cxn{
  function addPhotos($gallery_ID, $photo, $simpleImage){
    $count = count($_FILES['photo']['name']) - 1;
    for($i = 0; $i <= $count; $i++){
      $gallery_ID = $this->escape($gallery_ID);
      $filename = $photo->addPhoto($_FILES['photo']['name'][$i], $_FILES['photo']['tmp_name'][$i], $simpleImage, 'relative-path/to/photo-directory/', 500); //last Argument is how long you want the max length (width/height) to be.
      
      $sql = $this->cxn->query("INSERT INTO table (gallery_ID, filename) VALUES ('" . $gallery_ID . "', '" . $filename . "')");
      if($sql){
        $_SESSION['process_result'] = '<div class="notify-success">Images have successfully been uploaded.</div>';
        header("Location: " . $_SEVER['HTTP_REFERER']);
      }
    }
  }
}
$gallery = new gallery();
?>
