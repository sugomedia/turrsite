<?php
  $result = $db->query("SELECT 
  comments.ID AS 'ID',
  comments.userID,
  comments.commentdate AS 'date',
  comments.comment as 'comment',
  comments.postID,
  users.ID,
  users.fullname AS 'name',
  users.avatar AS 'avatar'
  FROM comments INNER JOIN users ON comments.userID = users.ID WHERE comments.postID = $id");

  foreach($result as $value){
    if($value['avatar'] == "") $avatar = $basic;
    else $avatar = $value['avatar'];

    echo '
    <div class="commentbody">
  <div class="commentavatar" style="background-image:url('.$avatar.')">
  </div>
  <div class="commentname">
  '.$value['name'].'
  </div>
  <div class="commentdate">
  '.$value['date'].'
  </div>
  <div class="comment">
  '.$value['comment'].'
  </div>
</div>';
  }
?>