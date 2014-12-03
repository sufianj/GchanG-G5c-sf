<?php 
    session_start();
    $page='recherche';
?>
<!DOCTYPE HTML>
<html>
	<head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="stylepages.css" />
                <link rel="stylesheet" href="../structure/stylestructure.css" /> 
                <link rel="stylesheet" href="etoile.css" />
                <link rel="icon" type="images/png" href="../../images/favicone.png">
                <title>GchanG</title>
                <script 
src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                <script type="text/javascript">
                var i=0;
                var j=0;
                var k=0;
                var button=document.getElementById('show');
                $(document).ready(function(){

                  for(i=3;i<j;i++) $("#table"+i).hide();
                  i=3;

                  $("#show").click(function(){
                  for(k=0;k<3;k++){
                      $("#table"+i).show(500);
                      i++;
                      if(i===j)$("#btn").hide();
                      if(i===j)break;
                  }
                  });
                  
                });
</script>
	</head>
        
        
<body>
    

<div id="page">
    
    <?php include ('../structure/header.php');?>
    
    <?php include ('../structure/nav.php');?>
    
    <?php include ('../structure/aside.php');?>
    
    <!--corps-->
    <article>

        <?php 
	
	include ("../structure/resultat_recherche.php");  ?>
        <?php

	$number = 0;
	include '../structure/connexion_bdd.php';
	echo '<br />';
        $resultats = $bdd->query("$reponse");
	
	if(isset($_SESSION['id'])){
	    $idclientcher = $_SESSION['id'];
	    include '../structure/connexion_bdd.php';
	    $coordo = $bdd->query("SELECT lat,lon FROM client WHERE idClient='$idclientcher'");
	    while ($coordonnes = $coordo->fetch()){
		$lat=$coordonnes['lat'];
		$lon=$coordonnes['lon'];
	    }
	}
	if(isset($_GET['tridist'])){
	    if(!(isset($_SESSION['id']) && $lat!=0 && $lon!=0)){
		echo "Le tri par distance n'est disponible que pour les personnes connectées 
ayant indiquées leur localisation sur la page mon compte";
		echo '<br /><br />';
	    }
	}
	if(isset($_SESSION['id']) && $lat!=0 && $lon!=0){
	include ("../structure/googlemap/traitementcoor.php");
	}else{
	while ($donnees = $resultats->fetch()){
            echo '<div id="table';
            echo $number;
            echo '">';
	    echo '<a href="../pages/objet.php?id=';
	    echo $donnees['idObjet'];
		echo "\">";
		echo '<table class="resultatrech"><tr><td></td><td><h1 style ="font-size:20px">';
		echo $donnees['TitreObjet'];
		echo '</h1></td></tr><tr><td class="image"><img src="../../images/objets/';
                echo $donnees['idObjet'];
		echo '.jpg"  alt="Objet" width="100" height="100"></td><td style ="font-size:15px">Description : ';
                echo $donnees['DescriptionObjet'];
		echo '<br /> Type d\'opération : ';
		echo $donnees['TypeOperation'];
		echo '<br /> Propriétaire : ';
		echo "<a href=../pages/utilisateurs.php?utilisateur='$donnees[PseudoProprio]'>";
		echo $donnees['PseudoProprio'];
		echo '</a>';
                $idObjet = $donnees['idObjet'];
                include_once '../structure/fonction_notation.php';
                $reponse3 = $bdd->query("SELECT AVG(note) FROM commentobjet WHERE idObjet='$idObjet';");
                if($donnees3 = $reponse3->fetch())
                {
                    echo '<br />'."moyenne de notes:";
                    afficher_les_etoiles($donnees3['AVG(note)']);
                }
                else 
                {
                    echo '<br />'."moyenne de notes:";
                    afficher_les_etoiles(0);
                }
		echo '</td></tr></table>';
		echo '</a>';
		echo '<br /><br />';
                echo '</div>';
                $number ++;
		
        }
        echo '<script>j=';
        echo $number;
        echo ';</script>';
	}
        ?>


        <div id="btn" style="margin-left: 40%;">
        <button id="show" name="show" type="button">Plus d'objets</button>

        </div>
    </article>
   


    
 
    <?php include ('../structure/footer.php');?> 
</div>

</body>
</html>