<?php 
    session_start();
    $page='contact';
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
    
        $reponse = $bdd->query(' SELECT nom,contenu FROM admin WHERE nom="contact"');
        $donnees = $reponse->fetch();       
        echo $donnees['contenu'];
        $reponse->closeCursor();
        ?>  
        <!--
        <h1>Service clientèle</h1>
        Pour toute question, nhésitez pas à rechercher une réponse à votre question en utilisant le forum mis a votre disposition.
        Pour un signalement dun abus, veuillez en priorité cliquer sur les boutons signaler un abus sur les pages correspondantes ou 
        Si aucune réponse ne vous satisfait, envoyez un mail clair à léquipe à ladresse serviceclient@gchang.com.    <br />
        Nous restons à votre écoute.<br /><br />
        Cordialement, <br />
        Léquipe Gchang
        -->

    </article>


    
 
    <?php include ('../structure/footer.php');?> 
</div>

</body>
</html>