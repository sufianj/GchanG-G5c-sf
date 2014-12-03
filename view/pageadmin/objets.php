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
    
    
    <?php
    if(isset($_POST['suppobjet'])){
    $suppobjet = $_POST['suppobjet'];
    include '../structure/connexion_bdd.php';
    define("CHEMIN_IMAGE",'../../images/objets/');
    $reponse = $bdd->query("SELECT idObjet FROM objet "
            . "WHERE idObjet='$suppobjet'");
    while($donnees = $reponse->fetch()){
        $name = $donnees['idObjet'];
        $name = $name.'.jpg';
        if (file_exists(CHEMIN_IMAGE.$name))
            unlink(CHEMIN_IMAGE.$name);
    }
    
    $bdd->exec("DELETE FROM objet WHERE idObjet = '$suppobjet'");
    }
    
    
    
    ?>
    
    
    
    
    <!--corps-->
    <article>


        <?php
        include '../structure/connexion_bdd.php';

        echo '<br />';
        /*$resultats = $bdd->query("SELECT * FROM objet");*/
	include ("../structure/resultat_recherche.php");
	$resultats = $bdd->query("$reponse");
	
        while ($donnees = $resultats->fetch()){
     



		echo '<table class="resultatrech"><tr><td>';
		echo '<form method="post">';
		echo '<input type="hidden" name="suppobjet" value="';
		echo $donnees['idObjet'];
		echo '" /><input type="submit" class="croix"';
		echo "onclick=\"if (window.confirm('Etes vous sur de vouloir supprimer cela?')) 
{location.href='default.htm';return true;} else {return false;}\"";
		echo '>';
		echo '</form>';
		echo '</td><td><h1 style ="font-size:20px">';
		echo $donnees['TitreObjet'];		
                $photoobjet = $donnees['idObjet'].'.jpg';
                echo '</h1></td></tr><tr><td class="image">';
                if (file_exists("../../images/objets/$photoobjet"))
		{
                    echo '<img src="../../images/objets/';
                    echo $donnees['idObjet'];
                    echo '.jpg"  alt="Objet" width="100" height="100">';
                
                }
                else{
                    echo '<img src="../../images/objets/none.jpg" width="100" height="100">';
                }
                echo '</td><td style ="font-size:15px">Description : ';
                echo $donnees['DescriptionObjet'];
		echo '<br /> Type d\'opération : ';
		echo $donnees['TypeOperation'];
		echo '<br /> Propriétaire : ';

		echo $donnees['PseudoProprio'];

		echo '</td></tr></table>';

		echo '<br /><br />';
		
        }
        ?>


    </article>


    
 
    <?php include ('../structure/footeradmin.php');?> 
</div>

</body>
</html>