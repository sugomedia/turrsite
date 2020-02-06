<?php
    if(isset($_SESSION['uid'])){
        header("location: index.php");
    }

    if(isset($_POST['login'])){
        $email = escapeshellcmd($_POST['email']);
        $pass = escapeshellcmd($_POST['password']);

        if(empty($email) ||
        empty($pass)){
            showError("Nem adott meg minden adatot!");
        } else {
            $db->query("SELECT * FROM users WHERE email='$email'");

            if($db->numRows() == 0){
                showError("Nem létezik ilyen felhasználó!");
            } else {
                $res = $db->fetchAll();
                if(SHA1($pass) != $res[0]['password']){
                    showError("Hibás jelszó!");
                } else {
                    $_SESSION['uid'] = $res[0]['ID'];
                    $_SESSION['umail'] = $res[0]['email'];

                    $db->query("UPDATE users SET last = CURRENT_TIMESTAMP, status = 1 WHERE ID=".$_SESSION['uid']);

                    header("location: index.php");
                }
            }
        }
    }
    else {
        $email = "";
    }
?>