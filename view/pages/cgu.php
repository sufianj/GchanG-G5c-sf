<?php 
    session_start();
    $page='cgu';
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
    <article>

    <?php       
        include '../structure/connexion_bdd.php';
   
        $reponse = $bdd->query(' SELECT nom,contenu FROM admin WHERE nom="cgu"');
        $donnees = $reponse->fetch();       
        echo $donnees['contenu'];
        $reponse->closeCursor();
        ?>  
        
        <!--
        <h1>test</h1>
        -->

    </article>


    
 
    <?php include ('../structure/footer.php');?> 
</div>

</body>
</html>