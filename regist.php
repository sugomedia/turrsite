<!DOCTYPE html>
<html>
<head>
<title>Türr-Site | Regisztráció</title>
      <link rel="stylesheet" href="css/regist.css">
</head>
<body>
<div class="login-reg-panel">
							
		<div class="register-info-box">
			<h2>Már regisztráltál?</h2>
			<p>Kattints ide és jelentkezz be!</p>
			<label id="label-register"><a href="login.php">Belépés</a></label>
			<input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
		</div>
							
		<div class="white-panel">
            <div id="logo" class="col-xs-12 col-sm-2">
                <img src="img/logo.png" class="img-responsive" alt="Turr-Site">
            </div>
                <h2 id="cim">Türr-Site</h2>

			<div class="login-show">
				<h2>REGISZTRÁCIÓ</h2>
				
				<form action="register.php" method="post" enctype="multipart/form-data">
				<input type="text" name="nev" class="input" placeholder="Teljes név">
                <input type="text" name="om" class="input" placeholder="OM azonosító">
				<input type="text" name="email" class="input" placeholder="E-mail">
				<input  type="password" name="password_1" class="input" placeholder="Jelszó">
				<input  type="password" name="password_2" class="input" placeholder="Jelszó ismétlés">
				<input  type="submit" class="gomb" name="reg_user" value="Regisztráció">
				</form>
				<font color="red">
				<b></b></font>
			</div>

		</div>
	</div>
</body>
</html>