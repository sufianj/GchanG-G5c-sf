<?php

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


function mdpcorrect($mdp){
    if(testpassword($mdp)>80){
	return TRUE;
    }else{
	return FALSE;
    }    
}

function mdpegal($mdpa,$mdpb){
    if($mdpa==$mdpb && testpassword($mdpa)>80){
        return TRUE;
    }else{
	return FALSE;    
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
	return TRUE;
    }else{
	return FALSE;
    }
}




?>