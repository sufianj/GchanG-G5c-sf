<?php

$r = 6371;


include '../structure/connexion_bdd.php';
$idclientcher=$_SESSION['id'];
$reponse = $bdd->query("SELECT lat,lon FROM client WHERE idClient='$idclientcher'");
while($coor=$reponse->fetch()){

    $latcher=$coor['lat']*3.14/180;
    $loncher=$coor['lon']*3.14/180;
   
}
$i=0;
while ($donnees = $resultats->fetch()){
     
    $tab[$i]['idObjet'] = $donnees['idObjet'];
    $tab[$i]['TitreObjet'] = $donnees['TitreObjet'];
    $tab[$i]['DescriptionObjet'] = $donnees['DescriptionObjet'];
    $tab[$i]['TypeOperation'] = $donnees['TypeOperation'];
    $tab[$i]['PseudoProprio'] = $donnees['PseudoProprio'];
    $tab[$i]['idUtilisateur'] = $donnees['idUtilisateur'];
    
	include '../structure/connexion_bdd.php';
	$idclient=$donnees['idUtilisateur'];
	$reponse = $bdd->query("SELECT lat,lon FROM client WHERE idClient='$idclient'");
	
	while($coor=$reponse->fetch()){
	    $latobj=$coor['lat']*3.14/180;
	    $lonobj=$coor['lon']*3.14/180;
	    
	    
	}
	if($idclient == $idclientcher){
	    $dist=10000000000;
	}elseif($latobj == 0 && $lonobj == 0){
	    $dist=100000000000;
	}else{
	    $dist=$r*acos(sin($latobj)*sin($latcher)+cos($latobj)*cos($latcher)*cos($lonobj-$loncher));

	}
	$dist = floor($dist*1000)/1000;
	
	
    $tab[$i]['dist'] = $dist;
    $i++;
    
}


//Fontion de tri par distance


if(isset($_GET['tridist'])){
    

function cmp($a, $b)
{
    return $a['dist']-$b['dist'];
}
usort($tab, 'cmp');
}


for($v=0; $v<$i; $v++){

    echo '<div id="table';
    echo $v;
    echo '">';
    echo '<a href="../pages/objet.php?id=';
    echo $tab[$v]['idObjet'];
    echo "\">";
    echo '<table class="resultatrech"><tr><td></td><td><h1 style ="font-size:20px">';
    echo $tab[$v]['TitreObjet'];
    echo '</h1></td></tr><tr><td class="image"><img src="../../images/objets/';
    echo $tab[$v]['idObjet'];
    echo '.jpg"  alt="Objet" width="100" height="100"></td><td style ="font-size:15px">Description : ';
    echo $tab[$v]['DescriptionObjet'];
    echo '<br /> Type d\'opération : ';
    echo $tab[$v]['TypeOperation'];
    echo '<br /> Propriétaire : ';
    $pro = $tab[$v]['PseudoProprio'];
    echo "<a href=../pages/utilisateurs.php?utilisateur='$pro'>";
    echo $tab[$v]['PseudoProprio'];
    echo '</a><br />';
    if ($tab[$v]['dist']<10000000000){
	echo ' Distance : ';
	echo $tab[$v]['dist'];
	echo ' m'; 
    }elseif($tab[$v]['dist']<100000000000){
	echo 'Cet objet est pottentielement à coté de vous';
    }else{
	echo "Le propriétaire n'a pas indiqué sa localisation";
    }
    
    $idObjet = $tab[$v]['idObjet'];
    
/* erreur: chemin relatif 'cannot open stream'
   include_once('/var/www/G5c/view/structure/fonction_notation.php');*/
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
    echo'</td></tr></table>';
    echo '</a>';
    echo '<br /><br />';
    echo '</div>';
    
    
}
    
        echo '<script>j=';
        echo $v;
        echo ';</script>';
    
function afficher_les_etoiles($note)
{
   echo '<form>';
    if (0 >= $note)
    {
                echo '<fieldset class="rating" disabled>
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="EXCELLENT">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="BON">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="MOYEN">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="FAIBLE">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="TRES FAIBLE">1 star</label>
            </fieldset>';
    }
    else if (1 >= $note)
    {
        echo '<fieldset class="rating" disabled>
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="EXCELLENT">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="BON">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="MOYEN">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="FAIBLE">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" checked/><label for="star1" title="TRES FAIBLE">1 star</label>
            </fieldset>';
    }
    else if (2 >= $note)
    {
                echo '<fieldset class="rating" disabled>
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="EXCELLENT">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="BON">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="MOYEN">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" checked/><label for="star2" title="FAIBLE">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="TRES FAIBLE">1 star</label>
            </fieldset>';
    }
    else if (3 >= $note)
    {
                echo '<fieldset class="rating" disabled>
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="EXCELLENT">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="BON">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" checked/><label for="star3" title="MOYEN">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="FAIBLE">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="TRES FAIBLE">1 star</label>
            </fieldset>';
    }
    else if (4 >= $note)
    {
        echo '<fieldset class="rating" disabled>
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="EXCELLENT">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" checked/><label for="star4" title="BON">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="MOYEN">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="FAIBLE">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="TRES FAIBLE">1 star</label>
            </fieldset>';
    }
    else if (5 >= $note)
    {
                echo '<fieldset class="rating" disabled>
                <input type="radio" id="star5" name="rating" value="5" checked/><label for="star5" title="EXCELLENT">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="BON">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="MOYEN">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="FAIBLE">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="TRES FAIBLE">1 star</label>
            </fieldset>';
    }
    echo '</form><br />';
}


    
    ?>