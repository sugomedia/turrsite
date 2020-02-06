<?php
    if(isset($_SESSION['uid'])){
        $db->query("UPDATE users SET status = 0 WHERE ID=".$_SESSION['uid']);
        unset($_SESSION['uid']);
        unset($_SESSION['umail']);
        header("location: index.php");
    }
?>