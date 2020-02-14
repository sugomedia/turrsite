<h3>Készitők</h3>
<hr>
<?php 
echo'
<div class="keszitok">';
  $db->query("SELECT ID AS '@ID',nev AS 'Név',evfolyam AS 'Évfoylam', szak AS 'Szak'  From creators ORDER BY nev ASC " );
  $db->toTable('');
  echo'</div>';
?>