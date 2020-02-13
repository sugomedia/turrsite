<?php
    $func = @$_GET['func'];
    if(empty($func)) 
    {
    
        include "posts/posts_create.php";
        include "posts/posts_list.php";
       
    }
    else
    {
        include $func.".php";
    }
?>