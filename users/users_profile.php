<h1>Adatok módosítása</h1>
<hr>


<?php



if(isset($_POST['modosit']))
{
    $fname=escapeshellcmd($_POST['fullname']);
    $email=escapeshellcmd($_POST['email']);
    $nem=$_POST['nem'];
    $avatar=$_FILES['fileToUpload']['name'];

    //Teljes név módosítása
    $db->query("SELECT fullname, ID FROM users WHERE fullname = '$fname' AND ID=" . $_SESSION['uid']);
    if(!empty($fname) && $db->numRows() == 0){
        $db->query("UPDATE users SET fullname='$fname' WHERE ID=" . $_SESSION['uid']);
        
    }

    //Email módosítása
    $db->query("SELECT email FROM users WHERE email = '$email'");
    if(!empty($email) && $db->numRows() == 0){
        $db->query("UPDATE users SET email='$email' WHERE ID=" . $_SESSION['uid']);
       
    }

   //Nem módosítása
    $db->query("UPDATE users SET gender='$nem' WHERE ID=" . $_SESSION['uid']);
    showSuccess("Az adataidat sikeresen megváltoztattad!");
    // Képfeltöltés
    if(!empty($avatar))
    {
      fajlfeltolt($_FILES['fileToUpload'],'target:avatar|maxsize:2|allow:jpg,png,bmp,jpeg|filename:'.$avatar);
      $db->query("UPDATE users SET avatar='avatar/$avatar' WHERE ID=".$_SESSION['uid']);
    }
}

$db->query("SELECT * FROM users WHERE ID=".$_SESSION['uid']);
$res=$db->fetchAll();
    
echo '
  <form action="?pg=home&func=users/users_profile" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Teljes név:</label>
    <input type="text" name="fullname" class="form-control" value="'.$res[0]['fullname'].'">
  </div>
  <div class="form-group">
    <label for="">Új email:</label>
    <input type="email" name="email" class="form-control" value="'.$res[0]['email'].'">
  </div>

  <div class="form-group">
    <label for="">Nem változtatás:</label>
    <select name="nem" class="form-control">
    <option value="">Válasszon...</option>
    <option value="ferfi" ';
    if($res[0]['gender']=="ferfi")
    {
      echo 'selected';
    }
    echo'>Férfi</option>
    <option value="no"
    ';
    if($res[0]['gender']=="no")
    {
      echo 'selected';
    }
    echo'
    >Nő</option>
    <option value="egyeb"
    ';
    if($res[0]['gender']=="egyeb")
    {
      echo 'selected';
    }
    echo'
    >Egyéb</option>
</select>
  </div>
 
  <label for="">Profilkép Változtatása:</label>
 <br />
<input type="file" name="fileToUpload" id="fileToUpload"><br />
  <div class="form-group">
    <input type="submit" name="modosit" value="Módosít" class="btn btn-primary">
  </div>
</form>
  ';
  ?>
 