<h1>Csoport hozzáadása</h1>
<hr>


<?php



if(isset($_POST['hozzaadas']))
{
    $group=escapeshellcmd($_POST['group']);
    $comment=escapeshellcmd($_POST['comment']);
    $userid=$_SESSION['uid'];

    //Csoport létezik-e
    if(empty($group) || empty($comment)){
        showError("Nem adtál meg minden adatot!");
    }
    else{
    $db->query("SELECT groupname FROM groups WHERE groupname='$group'");
        if($db->numRows()!=0){
            showError("Létezik már ilyen nevű csoport!");
        }
        else{
            $db->query("INSERT INTO groups VALUES(null, '$group', CURRENT_TIMESTAMP, '$userid', '$userid','$comment')");
            showSuccess("A csoportot sikeresen létrehoztad!");
        }
    }
}
echo '
  <form action="?pg=home&func=users/users_creategroups" method="POST">
  <div class="form-group">
    <label for="">Csoportnév:</label>
    <input type="text" name="group" class="form-control" value="Groupname">
  </div>
  <div class="form-group">
    <label for="">Megjegyzés:</label>
    <input type="text" name="comment" class="form-control" value="Comment">
  </div>

  

  <div class="form-group">
    <input type="submit" name="hozzaadas" value="Hozzáadás" class="btn btn-primary">
  </div>
</form>
  ';

  ?>