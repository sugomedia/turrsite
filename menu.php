<?php
    $db->query("SELECT COUNT('ID') AS 'messagecount' FROM messages WHERE sendtoID=".$_SESSION['uid']);
    $res = $db->fetchAll();
    $messagecount = $res[0]['messagecount'];

    $uid = $_SESSION['uid']; //A felhasználó lementett ID-ja/je

    echo '
<ul class="felsomenu"> 
    <li><a href="" >Profil</a></li>
    <li><a href="?pg=home&func=users/users_connections">Kapcsolatok';
    $db->query("SELECT * FROM contacts WHERE whoID = $uid AND status = 1");
    
    if($db->numRows() > 0){
        echo '<span class="badge szamlalo">' . $db->numRows() .'</span>';
    }

    echo '
    </a></li>
    <li><a href="" >Események
    <span class="badge szamlalo">38</span>
    </a></li>
    <li><a href="" >Szavazások</a></li>
    <li><a href="index.php?pg=home&func=messages/messages">Üzenetek
        <span class="badge szamlalo">'.$messagecount.'</span>
    </a></li>
    <li><a href="index.php?pg=home&func=keszitok">Készitők </a></li>
    <li><a href="?pg=users_logout"> Kilépés </a></li>
</ul>';
?>

