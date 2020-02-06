<div class="picuploadpost">
  Kép feltöltése: 
  <button type="submit" class="closepicupload btn btn-danger" onclick="return false;">Bezár</button>
  <hr>

  <form action="?pg=home" method="POST" enctype="multipart/form-data" class="">
    <div class="form-group imghere">
      <div class="imgpic"></div>
      Húzza ide a képet vagy tallózzon!
    </div> <hr>
    <div class="form-group picuploadform">
      <input type="file" name="picupload" class="pictureuploadinput btn btn-link">
      <input type="submit" name="uploadPicture" class="btn btn-primary" value="Feltöltés" onclick="return false;">
    </div>
  </form>
</div>