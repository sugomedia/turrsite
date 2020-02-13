<h1>Jelszó módosítás</h1>
<hr>

<?php
  if(isset($_POST['modosit'])){
    $oldpass = escapeshellcmd($_POST['oldpass']);
    $newpass1 = escapeshellcmd($_POST['newpass1']);
    $newpass2 = escapeshellcmd($_POST['newpass2']);

    if(empty($oldpass) ||
      empty($newpass1) ||
      empty($newpass2)){
        showError("Nem adtál meg minden adatot!");
    } 
    
    else {
      if($newpass1 != $newpass2){
        showError("Jelszavak nem egyeznek!");
      } else {
        $db->query("SELECT password FROM users WHERE ID=".$_SESSION['uid']);
        $res=$db->fetchAll();
        
        if($res[0]['password'] != SHA1($oldpass)){
            showError("Nem megfelelő a jelenlegi jelszó");
        } else {
            $newpass1 = SHA1($newpass1);
          if($res[0]['password'] == $newpass1){
            showError("Az új jelszó nem lehet ugyan az mint a régi jelszó");
          } else {
            $db->query("UPDATE users SET password='$newpass1' WHERE ID=".$_SESSION['uid']);
            showSuccess("Sikeres módosítás.");
          }
        }
      }
    }
  }

  echo '
  <form action="?pg=home&func=users/users_passmod" method="POST">
  <div class="form-group">
    <label for="">Jelenlegi jelszó:</label>
    <input type="password"name="oldpass" class="form-control">
  </div>
  <div class="form-group">
    <label for="">Új jelszó:</label>
    <input type="password" name="newpass1" class="form-control">
  </div>

  <div class="form-group">
    <label for="">Új jelszó mégegyszer:</label>
    <input type="password" name="newpass2" class="form-control">
  </div>

  <div class="form-group">
    <input type="submit" name="modosit" value="Módosít" class="btn btn-primary">
  </div>
</form>
  ';
?>

