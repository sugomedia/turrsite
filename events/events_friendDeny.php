<?php
    $p= $_GET['p'];
    $dID=$_GET['denyID'];
    $uid=$_SESSION['uid'];

    $db->query("INSERT INTO events VALUES (null,CURRENT_TIMESTAMP,$uid,'Elutasított egy barátkérelmet!')");
    $db->query("DELETE FROM contacts WHERE ID=" . $dID);
    header('location: index.php?pg='.$p.'&func=&func=users/users_connections');
?>