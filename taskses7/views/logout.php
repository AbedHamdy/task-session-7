<?php 
    // include("../inc/header.php");
    // include("../inc/nav.php");

    // include("../inc/footer.php"); 
    
    
    session_start();
    include("../core/function.php");

    session_destroy();
    redirect("./login.php");
    die;
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>