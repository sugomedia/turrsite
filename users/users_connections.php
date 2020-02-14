<h3>Kapcsolatok
<input type="text" id="quicksearch2" class="usersearch" placeholder="Keresés...">
</h3><hr>
<?php
    //0 = block; 1 = request; 2 = friend

    $uid = $_SESSION['uid']; //A felhasználó lementett ID-ja/je

    //beérkezett barátkérelmek
    $db->query("SELECT * FROM contacts WHERE whoID = $uid AND status = 1");

    //ha nincsen barátkérelem
    if($db->numRows() == 0){
        $db->usersConnectionList('','', 'info', 'Ismerős felkérés', 'Nincsen barát felkérésed');
    } else {
        //barátkérelmek lekérdezése
        $db->query("SELECT 
            contacts.ID,
            contacts.whoID,
            contacts.userID, 
            contacts.status, 
            users.ID AS 'ID2',
            users.fullname,
            users.avatar
            FROM contacts
            INNER JOIN users ON users.ID = userID
            WHERE whoID = $uid AND contacts.status = 1");

        $db->usersConnectionList('','ac|deny', 'info', 'Ismerős felkérés', '');
    }

    //kik a barátok
    $db->query("SELECT * FROM contacts WHERE (userID = $uid OR whoID = $uid) AND status = 2");
    
    //ha nincsenek barátaid
    if($db->numRows() == 0){
        $db->usersConnectionList('','', 'success', 'Barátlista', 'Nincsenek barátaid 😂👌😥😔');
    } else {
        //barátok kiiratása
        $db->query("SELECT 
            contacts.ID,
            contacts.whoID,
            contacts.userID, 
            contacts.status, 
            users.ID AS 'ID2',
            users.fullname,
            users.avatar
            FROM contacts
            INNER JOIN users ON users.ID = whoID
            WHERE (userID = $uid OR whoID = $uid) AND contacts.status = 2");

        $db->usersConnectionList('','r', 'success', 'Barátlista', '');
    }

    //lekérdezünk minden olyan contactot ahol a felhasználó megjelenik
    $db->query("SELECT * FROM contacts WHERE userID = $uid OR whoID = $uid");
    $res = $db->fetchAll();
    
    //ha nincs ilyen sor akkor kiirunk minden felhasználót 
    if($db->numRows() == 0){
        $db->query("SELECT ID, fullname, avatar FROM users WHERE ID <> $uid");

        $db->usersConnectionList('','a|b', 'default', 'Új ismerősök', '');
    } else /* Különben */{
        $what = array(); //létrehozunk egy tömböt

        //lekérdezünk minden felhasználót aki nem egyenlő a bej. felhasználóval
        $db->query("SELECT ID, fullname, avatar FROM users WHERE ID <> $uid");

        $x = array();
        foreach($res as $value){
            if(!in_array($value['userID'], $x)) $x[] = $value['userID'];
            if(!in_array($value['whoID' ], $x)) $x[] = $value['whoID' ];
        }

        foreach($db->queryresult as $value){
            if(/*!in_array($value['ID'], $what) && */!in_array($value['ID'], $x)){
                $what[] = array( // több dimenziós tömb létrehozása
                    /* Újra tudunk hivatkozni névvel a tömb indexére (key => value) */
                    'ID'       => $value['ID']      ,
                    'fullname' => $value['fullname'], 
                    'avatar'   => $value['avatar']
                );
            }
        }

        $db->usersConnectionList($what,'a|b', 'default', 'Új ismerősök', '');
    }


    //blockolt felhasználók
    $db->query("SELECT * FROM contacts WHERE (userID = $uid OR whoID = $uid) AND status = 0");

    //ha nincs senki letiltva
    if($db->numRows() == 0){
        $db->usersConnectionList('','', 'danger', 'Blockolt felhasználók', 'Nem tiltottál le <u><b><i>MÉG</i></b></u>&nbsp;&nbsp;senkit. 😱😳🤡🤬');
    } else {
        //tiltottak kiiratása
        $db->query("SELECT 
            contacts.ID,
            contacts.whoID,
            contacts.userID, 
            contacts.status, 
            users.ID AS 'ID2',
            users.fullname,
            users.avatar
            FROM contacts
            INNER JOIN users ON users.ID = whoID
            WHERE (userID = $uid OR whoID = $uid) AND contacts.status = 0");

        $db->usersConnectionList('','ub', 'danger', 'Blockolt felhasználók', '');
    }
?>