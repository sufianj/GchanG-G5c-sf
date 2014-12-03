<?php 
    session_start();
    $page='accueiladmin';
    if(isset($_SESSION['id'])){
    if($_SESSION['id']!="1"){
         print("<script type=\"text/javascript\">setTimeout('location=(\"../pages/accueil.php\")' ,0);</script>");
    }
    }else{
         print("<script type=\"text/javascript\">setTimeout('location=(\"../pages/accueil.php\")' ,0);</script>");
    }
?>
<!DOCTYPE HTML>
<html>
	<head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="stylepagesadmin.css" />
                <link rel="stylesheet" href="../structure/stylestructure.css" />
                <link rel="icon" type="images/png" href="../../images/favicone.png">
                <title>GchanG</title>
	</head>
        
        
<body>
    
<div id="page">
    
    <?php include ('../structure/headeradmin.php');?>
    
    <?php include ('../structure/navadmin.php');?>
    
    <?php include ('../structure/asideadmin.php');?>
    
    <!--corps-->
    <article>


        <h1>Bienvenue sur le portail d'administration</h1>


    </article>


    
 
    <?php include ('../structure/footeradmin.php');?> 
</div>

</body>
</html>