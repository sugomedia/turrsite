<?php
    $p= $_GET['p'];
    $uID=$_GET['unblockID'];
    $uid=$_SESSION['uid'];

    $db->query("INSERT INTO events VALUES (null,CURRENT_TIMESTAMP,$uid,'Feloldott egy felhasználót!')");
    $db->query("DELETE FROM contacts WHERE ID=" . $uID);
    header('location: index.php?pg='.$p.'&func=&func=users/users_connections');
?>