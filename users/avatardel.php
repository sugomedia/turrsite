<?php
    $db->query("SELECT avatar FROM users WHERE ID=".$_SESSION['uid']);
    $res=$db->fetchAll();
    if(is_file($res[0]['avatar']))
    {
        unlink($res[0]['avatar']);
    }
    $db->query("UPDATE users SET avatar='' WHERE ID=".$_SESSION['uid']);
    header("location:index.php?pg=home&func=users/users_profile");
?>