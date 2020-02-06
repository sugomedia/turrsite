<?php

  $res = $db->query("SELECT posts.ID AS 'postID', 
  posts.userID, 
  posts.postdate AS 'date', 
  posts.post AS 'post',
  users.ID,
  users.fullname AS 'name',
  users.avatar AS 'avatar'
  FROM posts INNER JOIN users ON posts.userID = users.ID ORDER BY date DESC");

  foreach($res as $value){
    if($value['avatar'] == "") $avatar = $basic;
    else $avatar = $value['avatar'];

    $id = $value['postID'];

    echo '
    <div class="posts">
    <div class="postavatar" style="background-image:url('.$avatar.')"></div><div class="postusername">'.$value['name'].'</div><div class="postdate">'.$value['date'].'</div><div class="postcontent">'.$value['post'].'</div><div class="postcomments">';
    
    include "comments/comments_postcomment.php";

    echo '</div></div>
    ';
  }
?>