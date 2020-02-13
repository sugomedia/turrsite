<?php
    $p= $_GET['p'];
    $fID=$_GET['friendID'];
    $uid=$_SESSION['uid'];

    $db->query("INSERT INTO events VALUES (null,CURRENT_TIMESTAMP,$uid,'Ismerősnek jelölte!')");
    $db->query("INSERT INTO contacts VALUES (null,$uid,$fID,1)");
    header('location: index.php?pg='.$p.'&func=&func=users/users_connections');
?>