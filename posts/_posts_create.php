<?php
  if(isset($_POST['newpost'])){
    $post = escapeshellcmd($_POST['postcontent']);
    $id = $_SESSION['uid'];

    if(empty($post)){
      showError("Nem adál meg posztot!");
    } else {
      $db->query("INSERT INTO posts VALUES(null, $id, CURRENT_TIMESTAMP, '$post', 0)");
      unset($_POST['newpost']);
      unset($_POST['postcontent']);
      header("location: ?pg=home");
      exit;
    }
  }
?>