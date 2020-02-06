<?php
    $uid = $_SESSION['uid']; //A felhasználó lementett ID-ja/je

    //lekérdezünk minden olyan contactot ahol a felhasználó megjelenik
    $db->query("SELECT * FROM contacts WHERE userID = $uid OR whoID = $uid");
    $res = $db->fetchAll();
    
    //ha nincs ilyen sor akkor kiirunk minden felhasználót 
    if($db->numRows() == 0){
        $db->query("SELECT ID, fullname, avatar FROM users WHERE ID <> $uid");

        $db->usersConnectionList('','a');
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

        $db->usersConnectionList($what,'a');
    }
?>