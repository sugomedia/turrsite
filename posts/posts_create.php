<?php
  include "posts/_posts_create.php"
?>

<form action="index.php?pg=home" method="POST" class="makeposts">
  <br><div class="newposttitle">
    Új poszt létrehozása:
  </div><hr>
  <div class="form-group">
    <textarea class="form-control" name="postcontent" style="max-width:100%;min-width:100%;min-height:100px;max-height:500px;overflow-y:scroll;"></textarea>
  </div>
  <div class="form-group">
  <div class="picup"><?php //include "posts/_post_pictureUpload.php" ?></div>
  <div class="picupload"></div>
    <input onclick="return false;" type="submit" name="picturepost" value="Kép feltöltése!" class="btn btn btn-primary">
    <input type="submit" name="newpost" value="Posztolj!" class="btn btn btn-primary">
  </div>
</form><hr>