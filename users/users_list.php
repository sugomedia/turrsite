<?php
  @session_start();
  if(is_file("../data.php")){
    @require_once("../data.php");
    @require_once("../functions.php");
    @require_once("../database.php");
  } else {
    @require_once("data.php");
    @require_once("functions.php");
    @require_once("database.php");
  }
	
	// itt hozzuk létre a saját adatbázis objektumunkat $db néven
  @$db = new db($dbhost, $dbuser, $dbpass, $dbname);

  $db->query("SELECT ID, fullname, avatar, status FROM users WHERE status <> 0 ORDER BY last DESC LIMIT 0, 30");

  foreach($db->queryresult as $value){
    $class = "";
    $msg = "";

    switch($value['status']){
      case 1: $class = "userlist_available"; $msg = "Elérhető";
      break;
      case 2: $class = "userlist_busy"; $msg = "Elfoglat";
      break;
      default:
      break;
    }

    if($class != ""){

      if($value['avatar'] == ""){
        $avatar = $basic;
      } else {
        $avatar = $value['avatar'];
      }

      echo '
      <div class="subuserlist ">
        <div class="userlistavatar col-xs-2 '.$class.'" style="background-image:url('.$avatar.')"></div>
        <div class="col-xs-10">
        <div class="userlistname "><a href="?pg=home&func=messages/newmessage&id='.$value['ID'].'">'.$value['fullname'].'</a></div>
        <div class="userlistmsg">'.$msg.'</div>
      </div>
      </div>
      ';
    }
  }


?>

