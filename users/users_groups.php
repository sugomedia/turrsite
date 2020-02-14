<?php
echo '
<h3 id=csoportcim>Csoportjaim:</h3>
<div class="form-group"> 
<input type="text" id="groupsearch" class="usersearch" placeholder="Keresés...">
</div>
<div class="usersgroup">';
    $db->query("SELECT * FROM groups");

    if($db->numRows() == 0){
        echo 'Nincs egy csoport sem!';
    } else {
        $csopibanvan = false;
        $str = '';
        $uid = $_SESSION['uid'];

        foreach($db->queryresult as $value){
            $IDs = explode(';', $value['userID']);

            for($i = 0; $i < sizeof($IDs); $i++){
                if(intval($IDs[$i]) == $uid){
                    $str .= '<div class="groups">' . $value['groupname'] . '</div>';
                    $csopibanvan = true;
                    break;
                }
            }
        }

        if($csopibanvan){
            echo $str;
        } else echo 'Nem vagy benne egy csoportban sem!';

    }
echo '</div>
';
?>