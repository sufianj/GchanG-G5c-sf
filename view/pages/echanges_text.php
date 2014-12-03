<?php

include '../structure/connexion_bdd.php';

$convert = $bdd->query("SELECT idClient,Pseudo FROM client WHERE idClient={$_GET['id']}");
$pseudo=$convert->fetch();
$p=$pseudo['Pseudo'];
$reponse = $bdd->query("
SELECT * 
FROM objet,messageoperation
WHERE (
    objet.idObjet = messageoperation.idObjet
    AND objet.PseudoProprio !=  '$p'
    AND messageoperation.Pseudo =  '$p'
	)
ORDER BY objet.idObjet
LIMIT {$_GET['sid']},1
");

//$reponse = $bdd->query(" SELECT * FROM objet ORDER BY idObjet LIMIT {$_GET['sid']},1");
$donnees = $reponse->fetch();
$jsonencode = json_encode($donnees);
echo $jsonencode;

?>
