
<?php

    include 'connexion_bdd.php';



        
    $reponsecat = $bdd->query('SELECT * FROM categorie');
 
    echo '<select name="grossecategorie" id="categorie"> ';
    $i=1;
    $idcat="idcat";
    $nomcat="nomcat";
    while($donneescat = $reponsecat->fetch()){
        echo '<option id="grossecategorie" value=';
        echo $i;
        echo '>';
        echo $donneescat['NomCategorie'];
        echo '</option>';

        

        $i=$i+1;
         
        
    }    
    $reponsecat->closeCursor(); 
    $reponsecat = $bdd->query('SELECT * FROM categorie');
       $i=1;
    while($donneescat = $reponsecat->fetch()){

    echo '<input type="hidden" name="';
        echo $idcat.$i;
        echo '" value="';
        echo $donneescat['idCategorie'];
        echo '"/>';
        
        echo '<input type="hidden" name="';
        echo $nomcat.$i;
        echo '" value="';
        echo $donneescat['NomCategorie'];
        echo '"/>';
    
    echo '</select>';
 $i=$i+1;
    }

    $reponsecat->closeCursor(); 
?>