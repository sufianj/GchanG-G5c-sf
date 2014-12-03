
<?php
    include 'connexion_bdd.php';



        
    $reponsesouscat = $bdd->query('SELECT * FROM subcategorie');
   
    
    echo '<select name="souscategorie" id="categorie"> ';
    
            while($donneessouscat = $reponsesouscat->fetch()){ 
               echo '<option>';
                echo $donneessouscat['NomSubCategorie'];
                echo '</option>';
         
        
    }    
    
    echo '</select>';
    


    $reponsesouscat->closeCursor(); 

?>