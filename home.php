<?php if(!isset($_SESSION['uid'])) header("location: index.php"); ?>

<link rel="stylesheet" href="css/turrsite.css">
<div id="container" class = "container-fluid">
  <div id="header">
      <div id="logo" class="col-xs-12 col-sm-1">
           <a href="index.php?pg=home"><img src="img/logo.png" class="img-responsive" alt="Turr-Site"></a>
           </div>    
           <div class="col-xs-12 col-sm-2 title">
           <?php
echo '<span>'.$pagename.'</span><br><p>'.$title.'</p>';



?>

      </div>    
      <nav class="col-xs-12 col-sm-9">
        <?php include("menu.php");?>  
      </nav>
      
  </div>
  <div id="pagecontent">

      <div id="leftside" class="col-xs-12 col-sm-3">
      <?php
            include "users/users_personalisation.php";
            include "users/users_groups.php";
          ?>
      </div>
      <div id="center" class="col-xs-12 col-sm-6">
        <?php
         include "function_loader.php";
       
        ?>
      </div>
      <div id="rightside" class="col-xs-12 col-sm-3">
        <div class="form-group"> 
          <input type="text" id="quicksearch" class="usersearch" placeholder="Keresés...">
        </div>
        
        <div class="userslist">
          <?php include "users/users_list.php";?>
        </div>
      </div>
              
  </div>
  <div id = "footer" class="col-xs-12"><?php echo $company.' - '.date("Y").'.'; ?></div>
</div>


