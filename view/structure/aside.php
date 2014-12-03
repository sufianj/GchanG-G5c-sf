<!--aside-->
<?php
$notif=0;
$notifperso=0;
if(isset($_SESSION['id'])){
    include '../structure/connexion_bdd.php';
$user=$_SESSION['id'];
$reponse = $bdd->query("SELECT * FROM notifoperation Where idUser=$user");

While($rep=$reponse->fetch()){
    
    $idobjet=$rep['idObjet'];
    $renvoi = $bdd->query("SELECT client.idClient,client.Pseudo,objet.idObjet,objet.PseudoProprio FROM client,objet WHERE objet.idObjet=$idobjet AND objet.PseudoProprio=client.Pseudo");
    $don=$renvoi->fetch();
    $idpseuproprio=$don['idClient'];
    
    if($idpseuproprio == $user){
	 $notif++;
    }else{
	$notifperso++;
    }
   
}

}


?>



<aside>
    <ul>
        <li>
            <a href="../pages/compte.php" class="bouton">
                <div class="boite_bouton">
                    Mon Compte  
                </div>                  
            </a>
        </li>
	
        <li>
            <a href="../pages/objets.php" class="bouton">
                <div class="boite_bouton">
                    Mes Objets 
                </div>  
            </a>
	    
		
	    
	    <?php
	    if($notif>0){
		echo '<span class=notif>';
		echo $notif;
		echo '</span>';
	    }
	    
	    ?>
	    
        </li>
	
        <li>
            <a href="../pages/echanges.php" class="bouton">
                <div class="boite_bouton">
                    Mes Echanges 
                </div>     
            </a>
	    <?php
	    if($notifperso>0){
		echo '<span class=notif>';
		echo $notifperso;
		echo '</span>';
	    }
	    
	    ?>
        </li>
        <li>
            <a href="../pages/recherche.php" class="bouton">
                <div class="boite_bouton">
                    Recherche 
                </div>
            </a>
        </li>
        
    </ul>
</aside>
