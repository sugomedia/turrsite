<?php
    if(isset($_POST['uploadPicture'])){
        $file = $_FILES["picupload"];

        if(empty($file)){
            showError("Nem választott ki file-t.");
        } else {
            $str = "target:img|maxsize:1|allow:jpg,png,gif,bmp|filename:" . uniqid() . date('Y-m-d');
            $fName = fajlfeltolt($file, $str);
            
            if($fName != ""){
                $fName = "<img src='img/" . $fName . "' alt='Nem megjeleníthető tartalom!'/>";
                $id = $_SESSION['uid'];
                $db->query("INSERT INTO posts VALUES(null, $id, CURRENT_TIMESTAMP, $fName, 0)");
            } else {
                showError("Hiba a feltöltés közben!");
            }
        }
    }
?>