<?php
$db->query("SELECT avatar, fullname FROM users WHERE ID=".$_SESSION['uid']);
$res = $db->fetchAll();

if($res[0]['avatar'] == ""){
    $avatar = $basic;
} else $avatar = $res[0]['avatar'];

echo '<div class="useravatar" style="background-image:url('.$avatar.')"></div>
<div class="username">'.$res[0]['fullname'].'</div>
<select class="statusUpdate" name="statusSelect">
    <option value="1">Elérhető</option>
    <option value="2">Elfoglalt</option>
    <option value="0">Rejtett</option>
</select><br>

<a href="?pg=home&func=users/users_passmod" class="btn btn-primary">Jelszó módosítása</a><br>
<a href="?pg=home&func=users/users_profile" class="btn btn-primary">Adatok módosítása</a><br>
<hr>';
 
?>