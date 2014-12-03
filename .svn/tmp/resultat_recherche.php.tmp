<?php







$reponse = "SELECT * FROM objet";
$where= "0"; 


if(!(!isset($_GET["operation"][0]) and !isset($_GET["operation"][1]) and !isset($_GET["operation"][2]) and !isset($_GET["operation"][3]))){
    if(!(isset($_GET["operation"][0]) and isset($_GET["operation"][1]) and isset($_GET["operation"][2]) and isset($_GET["operation"][3]))){
        if($where=="0"){
            $reponse = $reponse." WHERE";
            $where = "1";
        }
    }
}
if (!empty($_GET["recherche"])){
    if($where=="0"){
        $reponse = $reponse." WHERE";
        $where = "1";        
    }
}
if (isset($_GET["categorie"]) && $_GET["categorie"] != "0"){
    if($where=="0"){
        $reponse = $reponse." WHERE";
        $where = "1";

    }
}

/*gestion des categories*/
if (isset($_GET["categorie"])) {
    if (($_GET["categorie"] % 2) == 1 && $_GET["categorie"] != "0" ) {
        /*souscat*/
        $id = ($_GET["categorie"]);/* - 1) / 2;*/
        $reponse = $reponse." idCategorie ='";
        $reponse = $reponse.$id;
        $reponse = $reponse."' ";
       
    }elseif($_GET["categorie"] != "0" ){
        
        $id = ($_GET["categorie"]) / 2;
        $reponse = $reponse." idGrosseCat ='";
        $reponse = $reponse.$id;
        $reponse = $reponse."' ";
        
    }
}
$and = "0";
if(isset($_GET["categorie"]) && $_GET["categorie"] != "0"){
    if(!(isset($_GET["operation"][0]) && isset($_GET["operation"][1]) && isset($_GET["operation"][2]) && isset($_GET["operation"][3]))){
        if(isset($_GET["operation"][0]) or isset($_GET["operation"][1]) or isset($_GET["operation"][2]) or isset($_GET["operation"][3])){
                $and = "1";
                $reponse = $reponse." AND";
               
            
        }
    }
    if(!empty($_GET["recherche"]) && $and == "0"){
                
               $reponse = $reponse." AND";
             }
    
}
    
    /* gestion des types d'echanges*/       
if(!(isset($_GET["operation"][0]) && isset($_GET["operation"][1]) && isset($_GET["operation"][2]) && isset($_GET["operation"][3]))){
    if(isset($_GET["operation"][0]) or isset($_GET["operation"][1]) or isset($_GET["operation"][2]) or isset($_GET["operation"][3])){
            
       if(isset($_GET["recherche"])){
                    
               
		
                $reponse = $reponse." (";
        }


            
            if(isset($_GET["operation"][0])){ $reponse = $reponse." TypeOperation='"; $reponse = $reponse.$_GET["operation"][0];$reponse = $reponse."'";}
            if(isset($_GET["operation"][0]) and isset($_GET["operation"][1])){$reponse = $reponse." OR";}
            if(isset($_GET["operation"][1])){ $reponse = $reponse." TypeOperation='"; $reponse = $reponse.$_GET["operation"][1];$reponse = $reponse."'";}
            if((isset($_GET["operation"][0]) or isset($_GET["operation"][1])) and isset($_GET["operation"][2])){$reponse = $reponse." OR";}
            if(isset($_GET["operation"][2])){ $reponse = $reponse." TypeOperation='"; $reponse = $reponse.$_GET["operation"][2];$reponse = $reponse."'";}
            if((isset($_GET["operation"][0]) or isset($_GET["operation"][1]) or isset($_GET["operation"][2])) and isset($_GET["operation"][3])){$reponse = $reponse." OR";}
            if(isset($_GET["operation"][3])){ $reponse = $reponse." TypeOperation='"; $reponse = $reponse.$_GET["operation"][3];$reponse = $reponse."'";}
            if(isset($_GET["operation"][0]) or isset($_GET["operation"][1]) or isset($_GET["operation"][2]) or isset($_GET["operation"][3])){
           if($_GET["categorie"] != "0" or isset($_GET["recherche"])){$reponse = $reponse." )";}
            

           } 
           if(!empty($_GET["recherche"])){
               $reponse = $reponse." AND";
           }
}
}
            
       
       
         /*gestion du nom*/
       
      if(!empty($_GET["recherche"])){
   /*       $reponse = $reponse." TitreObjet LIKE '%";
          $reponse = $reponse.$_GET["recherche"];*/
          //case insensitive query
          $reponse = $reponse." UPPER(TitreObjet) LIKE '%";
          $reponse = $reponse.strtoupper($_GET["recherche"]);
          $reponse = $reponse."%'";          
      }
   
       $reponse = $reponse." ORDER BY idObjet DESC";
           
