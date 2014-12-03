<p class="image">
	Photo de profil:
	   <?php 
	
	$user = $_SESSION['pseudo'];
	$photopseudo=$user.".jpg";
	$photopseudo = str_replace ( "'", "", $photopseudo);
	if(file_exists("../../images/objets/$photopseudo")){
	    echo '<img src="../../images/objets/';
	    echo $photopseudo;
	    echo '"  alt="Photo de profil" width="100" height="100">';
	}else{
	    echo '<img src="../../images/objets/none.jpg" alt="Photo de profil" width="100" height="100">';
	}
		
		?>
	</p>
	
	
	<br />
	<form method="post" enctype="multipart/form-data">
	    <h2>Ajouter une photo de profil:</h2>
	    <input type="file" name="imageProfil" required />
	    <br />
	    <input type="submit" value="Envoyer" name="envoiimage"/>
	</form>