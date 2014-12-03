<!--nav-->
<nav>
     
    <div id="nav_gauche">
        
        
        <?php
        if (isset($page)){
            if ($page == 'aide'){
                include '../structure/navgauche/nav_aide.php';
            }elseif ($page == 'quisommesnous'){
                include ('../structure/navgauche/nav_quisommesnous.php');
            }elseif ($page == 'inscription'){
                include '../structure/navgauche/nav_inscription.php';
            }elseif ($page == 'cgu'){
                include ('../structure/navgauche/nav_cgu.php');
            }elseif ($page == 'compte'){
                include '../structure/navgauche/nav_compte.php';
            }elseif ($page == 'contact'){
                include ('../structure/navgauche/nav_contact.php');
            }elseif ($page == 'echanges'){
                include '../structure/navgauche/nav_echanges.php';
            }elseif ($page == 'forum'){
                include '../structure/navgauche/nav_forum.php';
            }elseif ($page == 'objets'){
                include '../structure/navgauche/nav_objets.php';
            }elseif ($page == 'mdpoublie'){
                include '../structure/navgauche/nav_mdpoublie.php';    
            }else{if(isset($_GET["categorie"])){
                include '../structure/navgauche/nav_resultat.php';
                }else{
                    include '../structure/navgauche/nav_recherche.php';
                }
                
            }
        }
           
        ?>

        
        
    </div>
        
        
    
    <div id="nav_droite">
        
	    <form method="get" action="recherche.php">
            <span>
                <h1>Nouvelle recherche:</h1>
                <?php include ('liste_categories.php');?>

                <input type="text" name="recherche" placeholder="Ex : Voiture"  class="barre_recherche"  autofocus/>
                <input type="submit" class="go" />

            </span></br>
            <span class="choix">

		<input type="checkbox" name="operation[]" value="Location" checked /> <label for="location">Location</label>
		<input type="checkbox" name="operation[]" value="Troc" checked class="check" /> <label for="troc">Troc</label>
		<input type="checkbox" name="operation[]" value="Don" checked class="check" /> <label for="don">Don</label>
		<input type="checkbox" name="operation[]" value="Pret" checked class="check" /> <label for="pret">Prêt</label>
		<input type="checkbox" name="tridist" class="check_accueil"/> <label for="tridist">Tri par distance</label>


            </span>
        </form>
    </div>
</nav>