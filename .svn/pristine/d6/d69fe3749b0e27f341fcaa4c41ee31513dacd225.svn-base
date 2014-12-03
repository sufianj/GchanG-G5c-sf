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
        if(isset($_POST['nouvcat'])){
            include '../structure/connexion_bdd.php';
            $bdd->exec("INSERT INTO categorie(NomCategorie) VALUES('$_POST[nouvcat]')"); 
        }    

        if(isset($_POST['nouvsouscat'])){
                 $idcat="idcat";
                 $nomcat="nomcat";
            include '../structure/connexion_bdd.php';
            $nouvsouscat = $_POST['grossecategorie'];
            $nomcat = $nomcat.$nouvsouscat;
            $idcat = $idcat.$nouvsouscat;
            $nvscat = $_POST['nouvsouscat'];
            $nomcat = $_POST[$nomcat];
            $idcat = $_POST[$idcat];
            $bdd->exec("INSERT INTO subcategorie(NomSubCategorie,CategorieAssocie,idCategorieAssocie) VALUES('$nvscat','$nomcat','$idcat')"); 
 
            
                    
                    
        }   
        if(isset($_POST['souscategorie'])){  
            include '../structure/connexion_bdd.php';
            $bdd->exec("DELETE FROM subcategorie WHERE NomSubCategorie='$_POST[souscategorie]'"); 
        }
        if(isset($_POST['grossecategorie']) && !isset($_POST['nouvsouscat']) ){  
            include '../structure/connexion_bdd.php';
	    $renvoicat = $bdd->query('SELECT * FROM categorie');
		$i=1;
		while($renvoi = $renvoicat->fetch()){
		    if($i==$_POST['grossecategorie']){
			$nomcat=$renvoi['NomCategorie'];
		    }
		    $i=$i+1;
		}    
	    
            $bdd->exec("DELETE FROM categorie WHERE NomCategorie='$nomcat'"); 
        }
        if(isset($_POST['nouvcatforum'])){
            include '../structure/connexion_bdd.php';
            $bdd->exec("INSERT INTO categorieforum(Titre) VALUES('$_POST[nouvcatforum]')"); 
        }    
        if(isset($_POST['catforum'])){  
            include '../structure/connexion_bdd.php';
            $bdd->exec("DELETE FROM categorieforum WHERE Titre='$_POST[catforum]'"); 
        }
        
        
        ?>
        
        
        
        
        
        

        <table>
            <tr>
                <td>

                </td>
                <td>
                    <h1>Ajouter une catégorie ou sous catégorie d'objet</h1>
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Ajouter une nouvelle sous-catégorie: </h2>
                </td>
                <td>
                    <form method="POST" action="categories.php">  
                        <input type='text' name='nouvsouscat' required>
                        <?php include '../structure/liste_grossecategories.php' ?>
                        <input type='submit' class='go'>
                    </form>
                </td>
                <td>

                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <h2>Ajouter une nouvelle catégorie: </h2>
                </td>
                <td>
                    <form method="POST" action="categories.php">  
                        <input type='text' name='nouvcat' required>
                        <input type='submit' class='go'>
                    </form>
                </td>
                <td>
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <h1>Supprimer une catégorie ou sous catégorie d'objets</h1>
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Supprimer une sous-catégorie: </h2>
                </td>
                <td>
                    <form method="POST" action="categories.php">  
                        <?php include '../structure/liste_souscategories.php' ?>
                        <input type='submit' class='go' onclick="if (window.confirm('Etes vous sur de vouloir supprimer cela?')) 
{location.href='default.htm';return true;} else {return false;}">
                    </form>
                </td>
                <td>
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Supprimer une catégorie: </h2>
                </td>
                <td>
                    <form method="POST" action="categories.php">  
                        <?php include '../structure/liste_grossecategories.php'?>
                        <input type='submit' class='go' onclick="if (window.confirm('Etes vous sur de vouloir supprimer cela?')) 
{location.href='default.htm';return true;} else {return false;}">
                    </form>
                </td>
                <td>
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <h1>Ajouter ou supprimer une catégorie du forum</h1>
                </td>
                <td>
                    
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Ajouter une catégorie: </h2>
                </td>
                <td>
                    <form method="POST" action="categories.php">  
                        <input type='text' name='nouvcatforum' required>
                        <input type='submit' class='go'>
                    </form>
                </td>
                <td>
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Supprimer une catégorie: </h2>
                </td>
                <td>
                    <form method="POST" action="categories.php">  
                        <?php include '../structure/liste_categorieforum.php'?>
                        <input type='submit' class='go' onclick="if (window.confirm('Etes vous sur de vouloir supprimer cela?')) 
{location.href='default.htm';return true;} else {return false;}">
                    </form>
                    
                    
                </td>
                <td>
                </td>
                <td>
                    
                </td>
            </tr>
        </table>


    </article>


    
 
    <?php include ('../structure/footeradmin.php');?> 
</div>

</body>
</html>