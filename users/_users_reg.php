<?php
    if(isset($_POST['reg'])){
        $fullname = escapeshellcmd($_POST['teljnev']);
        $email = escapeshellcmd($_POST['email']);
        $pw1 = escapeshellcmd($_POST['password']);
        $pw2 = escapeshellcmd($_POST['password2']);
        $om = escapeshellcmd($_POST['om']);

        if(empty($fullname) ||
        empty($email) ||
        empty($pw1) ||
        empty($pw2) ||
        empty($om)){
            showError("Nem adott meg minden adatot!");
        } else {
            if($pw1 != $pw2){
                showError("A megadott jelszavak nem egyeznek!");
            } else {

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    showError("Adjon meg egy érvényes email!");
                } else {
                    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,30}$/', $pw1)) {
                        showError("A jelszó nem felel meg a követelményeknek!<br>Követelmények<br>- Karakterek száma 8 - 30.<br>- Kis és nagybetű.<br>- Legalább egy szám.");
                    } else {
                        $db->query("SELECT * FROM users WHERE email='$email'");
        
                        if($db->numRows() != 0){
                            showError("Ez az email már regisztrált!");
                        } else {
                            $db->query("SELECT * FROM omnumbers WHERE om='$om'");
        
                            if($db->numRows() == 0){
                                showError("Csak Türr-ös OM azonosítóval rendelkező diákok regisztrálhatnak!");
                            } else {
                                $res = $db->fetchAll();
                                $omID = $res[0]['ID'];
        
                                $db->query("SELECT * FROM users WHERE omID=".$omID);
        
                                if($db->numRows() != 0){
                                    showError("Ezzel az OM azonosítóval már regisztáltak!");
                                } else {
                                    $pw1 = SHA1($pw1);
                                $db->query("INSERT INTO users VALUES(null, '$fullname', '$email', '$pw1', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP, '', 0, $omID, 'n/a')");
                                    //header("index.php");
                                    showSuccess("Sikeres regisztráció!");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    else {
        $fullname = "";
        $email = "";
        $om = "";
    }
?>