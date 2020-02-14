<!-- ------------------------------------ -->
<!-- Bajai SZC Türr István Szakgimnáziuma -->
<!-- Készítők:                          -->

<!-- Deák Nándor -->
<!-- Rekettye István -->
<!-- Tábori Erik-->
<!-- Varga Ervin -->
<!-- Fuszenecker Fanni                    -->
<!-- Dr. Török Tamás -->
<!-- ------------------------------------ -->
<!DOCTYPE html>
<?php
	session_start();
	require("data.php");
	require("functions.php");
	require("database.php");
	// itt hozzuk létre a saját adatbázis objektumunkat $db néven
	$db = new db($dbhost, $dbuser, $dbpass, $dbname);
?>
<html>
<head>
	<meta charset="utf-8">	
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/turrchat.css">
	<link rel="stylesheet" type="text/css" href="css/regist.css">
	<link rel="stylesheet" type="text/css" href="css/turrsite.css">

	

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.canvasjs.min.js"></script>
	<script type="text/javascript" src="js/statusUpdate.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	
	<script type="text/javascript">

		function loadusers()
		{
		    $('.userslist').load('users/users_list.php');
		}
		// beállítunk egy időzítőt, ami 1mp-ként meghívja a loadusers() függvényt
		setInterval(function(){loadusers()}, 1000);
	            
    </script>
</head>
<body>
<?php include("contentloader.php"); ?>
</body>
</html>