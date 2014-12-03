<?php

include '../structure/connexion_bdd.php';
$reponse = $bdd->query(" SELECT * FROM objet ORDER BY idObjet LIMIT {$_GET['sid']},1");
$donnees = $reponse->fetch();
$jsonencode = json_encode($donnees);
echo $jsonencode;
?>