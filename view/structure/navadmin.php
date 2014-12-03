<!--nav-->
<nav>
     
    <div id="nav_gauche">
        
        <h1>
            Administration
        </h1>
        
    </div>
        
        
    
    <div id="nav_droite">
        
        <form method="get" action="../pageadmin/objets.php">
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
               <input type="checkbox" name="operation[]" value="Pret" checked class="check" /> <label for="pret">Prét</label>


            </span>
        </form>
    </div>
</nav>