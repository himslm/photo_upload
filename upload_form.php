<?php
include("includes/configuration.php");
?>
<!DOCTYPE html>
<head>
  <title>Photo Uploader</title>
</head>
<body>
<form method="post" action="processes.php" enctype="multipart/form-data">
  <input type="hidden" name="gallery_ID" value="<?php echo $_GET['gallery_ID']; ?>" />
  <table border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td><label>Add Photos:</label></td>
      <td><input type="file" name="photo[]" multiple="multiple" /></td>
    </tr>
  </table>
</form>
</body>
</html>
