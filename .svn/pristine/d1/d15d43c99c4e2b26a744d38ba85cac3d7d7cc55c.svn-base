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
    
    <!--corps-->
    <article>
        
        
        
        <?php
        if(isset($_POST['supp'])){
            include '../structure/connexion_bdd.php';
            define("CHEMIN_IMAGE",'../../images/objets/');
            //Efface les images de ses objets
            $reponse = $bdd->query("SELECT idObjet FROM objet "
                    . "WHERE idUtilisateur='$_POST[id]]'");
            while($donnees = $reponse->fetch()){
                $name = $donnees['idObjet'];
                $name = $name.'.jpg';
                if (file_exists(CHEMIN_IMAGE.$name))
                    unlink(CHEMIN_IMAGE.$name);
            }
            $reponse->closeCursor();
            
            //Efface son photo
            $reponse = $bdd->query("SELECT Pseudo FROM client "
                    . "WHERE idClient='$_POST[id]]'");
            while($donnees = $reponse->fetch()){
                $name = $donnees['Pseudo'];
                $name = $name.'.jpg';
                if (file_exists(CHEMIN_IMAGE.$name))
                    unlink(CHEMIN_IMAGE.$name);
            }
            
            $bdd->exec("DELETE FROM client WHERE idClient='$_POST[id]'"); 
        }
        
	
	if(isset($_POST['admind'])){
	    include '../structure/connexion_bdd.php';
	    $id=$_POST['id'];
	    $bdd->exec("UPDATE client SET Admin='0' WHERE idClient='$id'");   
	}
	if(isset($_POST['adminu'])){
	    include '../structure/connexion_bdd.php';
	    $id=$_POST['id'];
	    $bdd->exec("UPDATE client SET Admin='1' WHERE idClient='$id'");
	}
        
        ?>


        <h1>Listes des Clients:</h1>
        
        
         <?php       
        include '../structure/connexion_bdd.php';

        $reponse = $bdd->query(' SELECT idClient,Pseudo,Admin,AdresseMail,NomUtilisateur,PrenomUtilisateur,Sexe,DateNaissance,DateInscription FROM client WHERE idClient!="1"');
        
        echo "<table id='listeutilisateurs'>";
        echo '<thead><tr><td>Pseudo</td><td>Nom</td><td>Prenom</td><td>Mail</td><td>Sexe</td><td>Date de Naissance</td><td>Date d\'inscription</td></tr></thead><tbody>';
        While($donnees = $reponse->fetch()){
            echo '<tr>';
            echo '<td>';
            echo $donnees['Pseudo'];
            echo '</td>';
            echo '<td>';
            echo $donnees['NomUtilisateur'];
            echo '</td>';
            echo '<td>';
            echo $donnees['PrenomUtilisateur'];
            echo '</td>';
            echo '<td>';
            echo $donnees['AdresseMail'];
            echo '</td>';
            echo '<td>';
            echo $donnees['Sexe'];
            echo '</td>';
            echo '<td>';
            echo $donnees['DateNaissance'];
            echo '</td>';
            echo '<td>';
            echo $donnees['DateInscription'];
            echo '</td>';
            echo '<td>';
            echo '<form method="post" action="utilisateurs.php" ><input type="hidden" name="id" value="';
            echo $donnees['idClient'];
            echo '" /><input type="submit" name="supp" class="croix"';
	    echo "onclick=\"if (window.confirm('Etes vous sur de vouloir supprimer cela?')) 
		    {location.href='default.htm';return true;} else {return false;}\"";
	    echo '/></form> ';
            echo '</td>';
	    if ($donnees['Admin']==1){
		echo '<td>';
		echo '<form method="post" action="utilisateurs.php" ><input type="hidden" name="id" value="';
		echo $donnees['idClient'];
		echo '" /><input type="submit" name="admind" class="down"/></form> ';
		echo '</td>';
	    }else{
		echo '<td>';
		echo '<form method="post" action="utilisateurs.php" ><input type="hidden" name="id" value="';
		echo $donnees['idClient'];
		echo '" /><input type="submit" name="adminu" class="up"/></form>';
		echo '</td>';
	    }

            echo '</tr>';
        }
        echo '</tbody></table>';
        
        
        
        
        
        
        
        $reponse->closeCursor();
        
        ?>  


    </article>


    
 
    <?php include ('../structure/footeradmin.php');?> 
</div>

</body>
</html>