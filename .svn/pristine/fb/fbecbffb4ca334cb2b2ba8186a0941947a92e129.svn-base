<?php 
    session_start();
    $page='quisommesnous';
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
  
        $reponse = $bdd->query(' SELECT nom,contenu FROM admin WHERE nom="qsn"');
        $donnees = $reponse->fetch();       
        echo $donnees['contenu'];
        $reponse->closeCursor();
        ?>  
        
        <!--
        <h1>Qui sommes-nous?</h1> <br /><br />
        
        Gchang.com est un site de petites annonces qui part dune idée simple : mettre en contact les vendeurs, donneurs, échangeur, troqueur et, les personnes désirant faire de bonnes affaires.<br /><br />
           
        Sur Gchang.com, déposer une annonce vous prendra 2 minutes. Vous choisissez le type de transaction parmis don, troc, prêt et location. Sélectionnez une catégorie puis saisissez le texte de votre annonce. <br />
        Remplissez le formulaire dinscription afin dêtre informé de létat de vos annonces et clients potentiels: cest simple, efficace et en plus totalement gratuit.<br />
        Gchang.com est un site généraliste. Vous pouvez déposer des annonces dans de nombreuses catégories. <br />
        Pour plus dinformations, vous pouvez également consulter la listes des questions / réponses sur le forum. <br /><br />

        A bientôt sur gchang.com <br />
        Cordialement,<br />
        Léquipe GchanG
        
        -->
    </article>


    
 
    <?php include ('../structure/footer.php');?> 
    
    
</div>

</body>
</html>