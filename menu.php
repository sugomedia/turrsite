<?php
    $db->query("SELECT COUNT('ID') AS 'messagecount' FROM messages WHERE sendtoID=".$_SESSION['uid']);
    $res = $db->fetchAll();
    $messagecount = $res[0]['messagecount'];

    echo '
<ul class="felsomenu"> 
    <li><a href="" >Profil</a></li>
    <li><a href="?pg=home&func=users/users_connections">Kapcsolatok</a></li>
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

