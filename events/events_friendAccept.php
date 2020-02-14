<?php
    $p= $_GET['p'];
    $aID=$_GET['acceptID'];
    $uid=$_SESSION['uid'];

    $db->query("INSERT INTO events VALUES (null,CURRENT_TIMESTAMP,$uid,'Ismerősnek jelölés elfogadva!')");
    $db->query("UPDATE contacts SET status = 2 WHERE ID = " . $aID);
    header('location: index.php?pg='.$p.'&func=&func=users/users_connections');
?>