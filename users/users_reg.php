<?php
    include "_users_reg.php";

    echo '<div class="login-reg-panel">
							
    <div class="register-info-box">
        <h2>Már regisztráltál?</h2>
        <p>Kattints ide és jelentkezz be!</p>
        <label id="label-register"><a href="?pg=users_login" class="gomb">Belépés</a></label>
        <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
    </div>
                        
    <div class="white-panel">
        <div id="loginlogo" class="col-xs-12 col-sm-2">
            <img src="img/logo.png" class="img-responsive" alt="Turr-Site">
        </div>
            <h2 id="cim">Türr-Site</h2>

        <div class="login-show">
            <h2>REGISZTRÁCIÓ</h2>
            
            <form action="index.php?pg=users_reg" method="post">
            <input type="text" name="teljnev" class="input" placeholder="Teljes név" value="'.$fullname.'">
            <input type="text" name="om" class="input" placeholder="OM azonosító" value="'.$om.'">
            <input type="text" name="email" class="input" placeholder="E-mail" value="'.$email.'">
            <input  type="password" name="password" class="input" placeholder="Jelszó">
            <input  type="password" name="password2" class="input" placeholder="Jelszó ismétlés">
            <input  type="submit" class="gomb" name="reg" value="Regisztráció">
            </form>
            <font color="red">
            <b></b></font>
        </div>

    </div>
</div>';
?>

