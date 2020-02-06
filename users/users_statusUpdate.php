<?php
@session_start();

$status = $_POST['status'];
$id = $_SESSION['uid'];

@require_once("../data.php");
@require_once("../functions.php");
@require_once("../database.php");
@$db = new db($dbhost, $dbuser, $dbpass, $dbname);

$db->query("UPDATE users SET status = $status, last = CURRENT_TIMESTAMP WHERE ID = $id");

?>