<!--

<select name="categorie" id="categorie"> 
    <optgroup label="Géneral">
        <option value="Nouveautées">Nouveautées</option>
        <option value="Les plus consultés">Les plus consultés</option>
    </optgroup>
    <optgroup label="Maison">
        <option value="Chambre">Chambre</option>
        <option value="Salle de bain">Salle de bain</option>
        <option value="Cuisine">Cuisine</option>
    </optgroup>
    <optgroup label="Jardin">
        <option value="Outils Fleural">Outils Fleural</option>
        <option value="Outils Forestier">Outils Forestier</option>
    </optgroup>
    <optgroup label="Divers">
        <option value="Livres">Livres</option>
        <option value="Jeux">Jeux</option>
    </optgroup>
</select>

-->

<?php

    include 'connexion_bdd.php';
   
    $reponsecat = $bdd->query('SELECT * FROM categorie');
    $reponsesouscat = $bdd->prepare('SELECT * FROM subcategorie Where CategorieAssocie= :catassocie ');
   
    
    echo '<select name="categorie" id="categorie"> ';
    echo '<option id="grossecategorie" value ="0">';
        echo '----';
        echo "TOUT";
        echo '----';
        echo '</option>';
    while($donneescat = $reponsecat->fetch()){
        echo '<option id="grossecategorie" value="';
        echo $donneescat['idCategorie']*2;
        echo '">';
        echo '->';
        echo $donneescat['NomCategorie'];
        echo '</option>';
        
            $reponsesouscat->execute(array(':catassocie'=>$donneescat['NomCategorie']));
            while($donneessouscat = $reponsesouscat->fetch()){ 
               echo '<option value="';
                echo $donneessouscat['idSubCategorie']*2+1;
               echo '">';
                echo $donneessouscat['NomSubCategorie'];
                echo '</option>';
        }
            
        
       
        
    }    
    
    echo '</select>';
    


    $reponsecat->closeCursor(); 
    $reponsesouscat->closeCursor(); 

?>