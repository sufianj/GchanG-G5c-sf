<?php 
    session_start();
    $page='accueil';  
?>


<!DOCTYPE HTML>
<html>
	<head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="stylepages.css" />
                <link rel="stylesheet" href="../structure/stylestructure.css" /> 
                <link rel="icon" type="images/png" href="../../images/favicone.png">
                <title>GchanG</title>
		<script src="../../jquery.js"></script>
		

	</head>
	
	<body>
	    <div id="fb-root"></div>


                <div id="page">

        <?php include ('../structure/header.php') ?>
			
			<form method="get" action="recherche.php">
				<div id="recherche_accueil">
					<?php include('../structure/liste_categories.php')  ?>
					<input type="text" name="recherche" placeholder="Ex : Voiture"  id="barre_recherche_accueil"  autofocus/>
					<input type="submit" class="go" />
					
				</div></br>
				<div id="choix_accueil">

					<input type="checkbox" name="operation[]" value="Location" checked /> <label for="location">Location</label>
					<input type="checkbox" name="operation[]" value="Troc" checked class="check_accueil" /> <label for="troc">Troc</label>
					<input type="checkbox" name="operation[]" value="Don" checked class="check_accueil" /> <label for="don">Don</label>
					<input type="checkbox" name="operation[]" value="Pret" checked class="check_accueil"/> <label for="pret">Prêt</label>
					<input type="checkbox" name="tridist" class="check_accueil"/> <label for="tridist">Tri par distance</label>
		  
					  
				 
				</div>
			</form>
			
			
			
                        <?php include ("../structure/caroussel_accueil.php"); ?>
			
			<?php include ("../structure/footer.php"); ?>
			
		</div>
	</body>