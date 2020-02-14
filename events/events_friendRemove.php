<?php
    $p= $_GET['p'];
    $rID=$_GET['removeID'];
    $uid=$_SESSION['uid'];

    $db->query("INSERT INTO events VALUES (null,CURRENT_TIMESTAMP,$uid,'Barátság megszüntetése!')");
    $db->query("DELETE FROM contacts WHERE ID=" . $rID);
    header('location: index.php?pg='.$p.'&func=&func=users/users_connections');
?>