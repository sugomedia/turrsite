<h3>Privát üzenet</h3>
<hr>
<?php
	$toID = $_GET['id'];
	if (isset($_POST['kuldes']))
	{
		$senderID = $_SESSION['uid'];
		$message = escapeshellcmd($_POST['message']);

		$db->query("INSERT INTO messages VALUES(null, $senderID, CURRENT_TIMESTAMP, '$message', $toID)");	
	}


echo '
<form method="POST" action="index.php?pg=home&func=messages/newmessage&id='.$toID.'">
	<div class="form-gorup">
		<textarea name="message" class="form-control"></textarea>
	</div>
	<br>
	<div class="form-gorup">
		<input type="submit" name="kuldes" value="Küldés" class="btn btn-primary">
	</div>
	<br>
</form>';

?>