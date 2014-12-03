<?php
    include 'connexion_bdd.php';



        
    $reponsecatforum = $bdd->query('SELECT * FROM categorieforum');
   
    
    echo '<select name="catforum" id="categorie"> ';
    
            while($donneescatforum = $reponsecatforum->fetch()){ 
               echo '<option>';
                echo $donneescatforum['Titre'];
                echo '</option>';
         
        
    }    
    
    echo '</select>';
    


    $reponsesouscat->closeCursor(); 

?>