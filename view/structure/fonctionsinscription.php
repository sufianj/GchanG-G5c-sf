<?php

function pseudoexistant($pseudo){
    $pseudocorrect = 0;
    include '../structure/connexion_bdd.php';
    $reponse = $bdd->query(' SELECT Pseudo FROM client');
    while ($donnees = $reponse->fetch()){
        if($donnees['Pseudo']==$pseudo){
            $pseudocorrect=1;
        }     
    }       
    $reponse->closeCursor();
    //le pseudo commence par une lettre et suivi par des chiffres ou '-' ou '_'
    //taille du pseudo est entre 3 et 20
    if (!preg_match('/^[a-z|A-Z]{1}[a-z|0-9|A-Z|-|_]{3,20}/', $pseudo))
            $pseudocorrect = 2;
    /*if($pseudocorrect==0){
        echo '<img src="../../images/vrai.png" alt="Vrai" class="image_validation"/> ';
    }else{
    echo '<img src="../../images/faux.png" alt="Faux" class="image_validation" title="Pseudo incorect (taille ou caracteres incorects)"/> ';
    
    }*/
    switch($pseudocorrect)
    {
        case 0:echo '<img src="../../images/vrai.png" alt="Vrai" class="image_validation"/> ';
               break;
        case 1:echo '<img src="../../images/faux.png" alt="Faux" class="image_validation" title="Pseudo déjà utilisée"/> ';
                break;
        case 2:echo '<img src="../../images/faux.png" alt="Faux" class="image_validation" title="Pseudo incorrect (taille ou caracteres incorects)"/> ';
                break;
        default: break;
    }
}



function mailexistant($mail){
    $mailcorrect = 0;
    include '../structure/connexion_bdd.php';
    $reponse = $bdd->query(' SELECT AdresseMail FROM client');
    while ($donnees = $reponse->fetch()){
        if($donnees['AdresseMail']==$mail){
            $mailcorrect=1;
        }     
    }       
    $reponse->closeCursor();     
  
    if($mailcorrect==0){
        echo '<img src="../../images/vrai.png" alt="Vrai" class="image_validation"/> ';
    }else{
        echo '<img src="../../images/faux.png" alt="Faux" class="image_validation" title="adresse mail déjà utilisée"/> ';
    }
}

function mdpcorrect($mdp){
    if(testpassword($mdp)>80){
        echo '<img src="../../images/vrai.png" alt="Vrai" class="image_validation" />';
    }else{
        echo '<img src="../../images/faux.png" alt="Faux" class="image_validation" title="Mot de passe trop simple"/>';
    }    
}

function mdpegal($mdpa,$mdpb){
    if($mdpa==$mdpb && testpassword($mdpa)>80){
        echo '<img src="../../images/vrai.png" alt="Vrai" class="image_validation" />';
    }else{
        echo '<img src="../../images/faux.png" alt="Faux" class="image_validation" title="les deux mots de passe ne sont pas identiques ou sont trop simples"/>';
    }    
}

function formulairebon($p,$m,$mdp1,$mdp2){
    $pseudocorrect = 0;
    $mailcorrect = 0;
    include '../structure/connexion_bdd.php';
    $reponse = $bdd->query(' SELECT Pseudo,AdresseMail FROM client');
    while ($donnees = $reponse->fetch()){
        if($donnees['Pseudo']==$p){
            $pseudocorrect=1;
        }    
        if($donnees['AdresseMail']==$m){
            $mailcorrect=1;
        }
    }       
    $reponse->closeCursor();
    
    
    
    if($pseudocorrect==0 && $mailcorrect==0 && $mdp1==$mdp2 && testpassword($mdp1)>80){
        return TRUE;
            }  else {
        return FALSE;
    }
    
}

function codeVeriBon($session_code, $post_code)
{
     if(strcasecmp($session_code, $post_code) == 0)
        echo '<img src="../../images/vrai.png" alt="Vrai" class="image_validation"/> ';
     else
        echo '<img src="../../images/faux.png" alt="Faux" class="image_validation" title="code erreur"/> ';
}


function testpassword($mdp){ 
$longueur = strlen($mdp);
$point = 0;
$point_min = 0;
$point_maj = 0;
$point_chiffre = 0;
$point_caracteres = 0;
for($i = 0; $i < $longueur; $i++) 	{
	$lettre = $mdp[$i];
 	if ($lettre>='a' && $lettre<='z'){
		$point = $point + 1;
		$point_min = 1;
	}
	else if ($lettre>='A' && $lettre <='Z'){
		$point = $point + 2;
		$point_maj = 2;
	}
	else if ($lettre>='0' && $lettre<='9'){
		$point = $point + 3;
		$point_chiffre = 3;
	}
	else {
		$point = $point + 5;
		$point_caracteres = 5;
	}
}
$etape1 = $point / $longueur;
$etape2 = $point_min + $point_maj + $point_chiffre + $point_caracteres;
$resultat = $etape1 * $etape2;
$final = $resultat * $longueur;
return $final;
}


function requeteinscription($pseudo,$email,$mdp,$nom,$prenom,$sexe,$naissance){
    include '../structure/connexion_bdd.php';
    $bdd->exec("INSERT INTO client(Pseudo,Pwd,AdresseMail,NomUtilisateur,PrenomUtilisateur,Sexe,DateNaissance) VALUES('$pseudo',SHA1('$mdp'),'$email','$nom','$prenom','$sexe','$naissance')"); 
}
