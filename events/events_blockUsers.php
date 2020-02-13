<?php
    $p= $_GET['p'];
    $bID=$_GET['blockID'];
    $uid=$_SESSION['uid'];

    $db->query("INSERT INTO events VALUES (null,CURRENT_TIMESTAMP,$uid,'Blokkolta!')");
    $db->query("INSERT INTO contacts VALUES (null,$uid,$bID,0)");
    header('location: index.php?pg='.$p.'&func=&func=users/users_connections');
?>