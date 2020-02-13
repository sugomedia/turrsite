<h3>Üzeneteim</h3>
<hr>
<?php
	$db->query("SELECT 
		ID AS '@ID',
		mesdate AS 'Dátum',
		userID AS 'Küldő',
		sendtoID AS 'Címzett'
	 FROM messages WHERE sendtoID=".$_SESSION['uid'].' OR userID='.$_SESSION['uid']);
	$db->toTable('i');
?>