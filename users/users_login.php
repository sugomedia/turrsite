<?php
    include "_users_login.php";

    echo ' <div class="login-reg-panel">
							
        <div class="register-info-box">
            <h2>Még nem regisztráltál?</h2>
            <p>Kattints ide és regisztrálj!</p>
            <label id="label-login" ><a href="?pg=users_reg" class="gomb">Regisztráció</a></label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>
                            
        <div class="white-panel">
            <div id="logo" class="col-xs-12 col-sm-2">
                <img src="img/logo.png" class="img-responsive" alt="Turr-Site">
            </div>
            <h2 id="cim">Türr-Site</h2>
            <div class="login-show">
                <h2>Belépés</h2>
                <form action="?pg=users_login" method="post" >
                <input type="text" name="email" placeholder="E-mail cím" value='.$email.'>
                <input type="password" name="password" placeholder="Jelszó">
                <input type="submit" class="gomb" name="login" value="Belépés">
                </form>
                <font color="red">
                <b></b></font>
            </div>
        </div>
    </div>
    ';
?>

