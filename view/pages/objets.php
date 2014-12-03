<?php
session_start();
$page = 'objets';
    if(!isset($_SESSION['id'])){
$url="../pages/compteinexistant.php";
	die('<meta http-equiv="refresh" content="0;URL='.$url.'">');   }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylepages.css" />
        <link rel="stylesheet" href="../structure/stylestructure.css" />
        <link rel="icon" type="images/png" href="../../images/favicone.png">
        <link rel="stylesheet" href="etoile.css" />
        <title>GchanG</title>
    </head>


    <body>
<?php 

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


if(isset($_POST['valider'])){
    $id = $_SESSION['id'];
    $titre = $_POST['titre'];
    $typeoperation = $_POST['typeoperation'];
    $categorie = $_POST['categorie'];
    $ameliorer = $_POST['ameliorer'];
    $pseudoproprio = $_SESSION['pseudo'];
    
    if($categorie % 2 == 0){
        $grossecat = $categorie/2;
    }else{
        $categorie= ($categorie-1)/2;

        include '../structure/connexion_bdd.php';
        $reponse = $bdd->query("SELECT idSubCategorie,idCategorieAssocie FROM subcategorie WHERE idSubCategorie='$categorie'");
        $donnees = $reponse->fetch();
        $grossecat = $donnees['idCategorieAssocie'];

        $categorie= ($categorie*2)+1;
        
        
        
        $reponse->closeCursor();
    }
    
    
    
    include '../structure/connexion_bdd.php';
    $reponse = $bdd->query("SELECT idObjet FROM objet ORDER BY idObjet DESC LIMIT 1");
    if($donnees = $reponse->fetch()){
        $last_id = $donnees['idObjet'];
    }
    else $last_id = 0;
    $reponse->closeCursor();
    $ameliorer = addslashes($ameliorer);
    $titre = addslashes($titre);
    $bdd->exec("INSERT INTO objet(idUtilisateur,TitreObjet,TypeOperation,idCategorie,DescriptionObjet,idGrosseCat,PseudoProprio) VALUES('$id','$titre','$typeoperation','$categorie','$ameliorer','$grossecat','$pseudoproprio')");
    $reponse = $bdd->query("SELECT idObjet FROM objet ORDER BY idObjet DESC LIMIT 1");
    if($donnees = $reponse->fetch()){
        $name = $donnees['idObjet'];
    }
    $reponse->closeCursor();
    if ($last_id != $name)
    {
        $name = $name.".jpg";
        $_FILES['imageObjet']['name']= $name;

        //TODO: normalement on enregistre le chemin de fichier dans base des donnees
        define("CHEMIN_IMAGE",'../../images/objets/');//poids constant
        /*$image = $_POST['image'];*/   
        if (is_uploaded_file($_FILES['imageObjet']['tmp_name']))
        {
        /*    copy ($_FILES['imageObjet']['tmp_name'], CHEMIN_IMAGE.$_FILES['imageObjet']['name']);
            echo $_FILES['imageObjet']['tmp_name'];*/

            //verification du type
            if($_FILES['imageObjet']['type'] != "image/png" && 
                   $_FILES['imageObjet']['type'] != "image/jpeg" &&
                    $_FILES['imageObjet']['type'] != "image/bmp")
            {   
                echo "l'image doit être téléchargée en format jpeg ou png ou bmp";
            }
            // je sais pas vous voulez combien le taille XD
            elseif ($_FILES['imageObjet']['size'] > 1048576)//environ iMo.Par default, upload_max_filesize = 2Mo <- bug T_T
            {
                echo "limite de taille dépassée.";
            }
            //déplacer le fichier de wamp/tmp Ã  wamp/www/G5c/image/objects
            else if (move_uploaded_file($_FILES['imageObjet']['tmp_name'],
                        CHEMIN_IMAGE.$_FILES['imageObjet']['name']))
            {
                echo '<script language="javascript">window.confirm("fichier est téléchargé réussi");</script>';
            }
            else
            {
                echo "<p>telecharge erreur</p>";
            }
        }//end of if (is_uploaded_file($_FILES['imageObjet']['tmp_name']))
        else{
            echo "<p>fichier n'est pas téléchargé au serveur</p>";
        }
    }

    
    
}



?>
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
        <div id="page">

            <?php include ('../structure/header.php'); ?>

            <?php include ('../structure/nav.php'); ?>

            <?php include ('../structure/aside.php'); ?>

            <!--corps-->
            <article>

            <?php include '../structure/connexion_bdd.php';
                       
               $reponse = $bdd->query("SELECT * FROM objet WHERE PseudoProprio='$_SESSION[pseudo]'"); 
               include_once '../structure/fonction_notation.php';
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
                $idObjet = $donnees['idObjet'];
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
   
		}
		$reponse->CloseCursor();
		    
		    
	?>
		    
		    
                    <form method="post" enctype="multipart/form-data">
                    <h1><b style ="font-size:30px">Ajouter un objet</b></h1>
                    

                    <table class='ajoutobjetmesobjet'>
                        <tr>
                              <td>Titre : <input class="formeajoutobjet" type="text" name="titre" required /></td>
                        
                        </tr>
                        <tr>
                            <td>
                                Choisir une illustration :
                                <br />
                                <input class="formeajoutobjet" type="file" name="imageObjet" />
                            </td>
                         
                        </tr>
                        <tr>
                        </tr>
                        <tr>

                            <td>
                                
                                <br />
                                Type : <input type="radio" name="typeoperation" value="Location" required /> Location
                                <input type="radio" name="typeoperation" value="Troc" required /> Troc 
                                <input type="radio" name="typeoperation" value="Don" required /> Don
                                <input type="radio" name="typeoperation" value="Pret" required /> Prêt 
                            </td> 
                                 
                        <tr>
                            <td>
                           
                            Catégorie : <?php include '../structure/liste_categories.php'; ?>  
                            </td>       
                        </tr>    
                        <tr>  
                            <td>
                                <label for="ameliorer">Description :</label><br />
                                <textarea name="ameliorer" cols='40' rows='5' id="ameliorer" required ></textarea>
                                
                            </td>
                        </tr>
                          </tr>  
                          <tr>
                              
                              <td><input class="formeajoutobjet" type="submit" name="valider" value="Valider"></td>
                              
                        
                        </tr>
                    </table>








                    </form>

            </article>




<?php include ('../structure/footer.php'); ?> 
        </div>

    </body>
</html>