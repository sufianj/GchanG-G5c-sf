<?php 
    session_start();
    $page='compteinexistant';
    if(isset($_SESSION['id'])){
         print("<script type=\"text/javascript\">setTimeout('location=(\"../pages/accueil.php\")' ,0);</script>");
    }
?>
<!DOCTYPE HTML>
<html>
	<head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="stylepages.css" />
                <link rel="stylesheet" href="../structure/stylestructure.css" />
                <link rel="icon" type="images/png" href="../../images/favicone.png">
                <title>GchanG</title>
	</head>
        
        
<body>
    
<div id="page">
    
    <?php include ('../structure/header.php');?>
    
    <?php include ('../structure/nav.php');?>
    
    <?php include ('../structure/aside.php');?>
    
    <!--corps-->
    <article class="normal">


        <h1>Veuillez vous créer un compte</h1>
	En cliquant ici :  <a class="lien" href="../pages/inscription.php">Inscription</a> 

    </article>


    
 
    <?php include ('../structure/footer.php');?> 
</div>

</body>
</html>