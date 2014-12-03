<?php 
    session_start();
    $page='echanges';
        if(!isset($_SESSION['id'])){
	$url="../pages/compteinexistant.php";
	die('<meta http-equiv="refresh" content="0;URL='.$url.'">');
	}
	?>
<?php
//header("Content-type: text/html; charset=latin1_bin");


function nbrnotif($idobjet){
    include '../structure/connexion_bdd.php';
    $user=$_SESSION['id'];
    $reponse = $bdd->query("SELECT * FROM notifoperation Where idUser=$user AND idObjet=$idobjet");
    $notif=0;
    While($rep=$reponse->fetch()){
    $notif++;
}
return $notif;
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
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	</head>
        
        
<body>
    
<div id="page">
    
    <?php include ('../structure/header.php');?>
    
    <?php include ('../structure/nav.php');?>
    
    <?php include ('../structure/aside.php');?>
    
    <!--corps-->
    <article>

	
		   <?php include '../structure/connexion_bdd.php';
		      $p = $_SESSION['pseudo']; 
		$reponse = $bdd->query("
		    SELECT * 
		    FROM objet,messageoperation
		    WHERE (
			objet.idObjet = messageoperation.idObjet
			AND objet.PseudoProprio !=  '$p'
			AND messageoperation.Pseudo =  '$p'
			    )
		    ORDER BY objet.idObjet
		    ");
		while($donnees=$reponse->fetch()){
		echo '<a href="../pages/objet.php?id=';
		echo $donnees['idObjet'];
		echo "\">";
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
		echo '   ';
		if (nbrnotif($donnees['idObjet'])>0){
		    echo '<span class=notif>';
		    echo nbrnotif($donnees['idObjet']);
		    echo '</span>';
		}
		
                
		
		echo '</h1></td></tr><tr><td class="image">';
                $photoobjet = $donnees['idObjet'].'.jpg';
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
		echo '</td></tr></table>';
		
		echo '</a>';
		
		echo '<br /><br />';
   
		}
		$reponse->CloseCursor();
		    
		    
	?>
    </article>





    
 
    <?php include ('../structure/footer.php');?> 
</div>

</body>
</html>