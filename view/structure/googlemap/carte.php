<br/>
<?php

if(isset($_POST['nouvadd'])){
    include '../structure/connexion_bdd.php';
    $lat=$_POST['lat'];
    $lon=$_POST['lon'];
    $adresse=$_POST['adresse'];
    $idclient=$_SESSION['id'];
    $bdd->exec("UPDATE client SET adresse='$adresse' WHERE idClient='$idclient'");
    $bdd->exec("UPDATE client SET Lat='$lat' WHERE idClient='$idclient'");
    $bdd->exec("UPDATE client SET Lon='$lon' WHERE idClient='$idclient'");

    
	
}

include '../structure/connexion_bdd.php';
$idclient=$_SESSION['id'];
$reponse = $bdd->query("SELECT adresse FROM client WHERE idClient='$idclient'");
$ad = "";
while($adresse=$reponse->fetch()){
    $ad=$adresse['adresse'];
}
if($ad==""){
    $ad="paris";
}


$reponse->closecursor();
?>





<strong>Entrez votre localisation:</strong>

	<div id="div_search" style="text-align: center; font-family: arial;width: 630px; height: 25px; padding: 5px; "><input type="text" style="width: 250px; border: 1px solid #b4b4b4; " id="search_addr" value="<?php echo $ad; ?>" /> &nbsp;  <input type="button" style="width: 200px; border: 1px solid #b4b4b4; background: #eeeeee;" onclick="coordonneesGPS();" value="r&eacute;cup&eacute;rer les coordonn&eacute;es"/></div>
	<div id="mapG3" style="width: 630px; height: 325px;  border: 1px solid #b4b4b4;"></div> 
	<div id="answer" style="text-align: center; padding-top: 25px; font-family: arial;width: 630px; height: 80px;"></div>
		<script type="text/javascript">
			var infobulle;
			var myMarker;
			function coordonneesGPS(){		
				address = document.getElementById('search_addr').value;
				geocoder = new GClientGeocoder();
				z = 10;
				geocoder.getLatLng(
					address,
					function(point) {								
						if (!point) {
						    alert("- "+address+" n'existe pas");
						}
						else {									
						    var a =  point.lat();						 
						    var b =  point.lng();
						    document.getElementById('answer').innerHTML = '<b>Votre Recherche</b> : '+address+' <br /><form method="post"><input type="hidden" name="adresse" value="'+address+'"/><input type="hidden" name="lat" value="'+a+'"/><input type="hidden" name="lon" value="'+b+'"/><input type="submit" name="nouvadd" value="Enregistrer les coordonées"/></form>';
						    searchCoord(address,a,b,z);	
							
					}});					
			}  
			function searchCoord(address,a,b,z){
				map = new GMap2(document.getElementById('mapG3'));	
				map.addControl(new GLargeMapControl3D()); 
				map.addControl(new GMenuMapTypeControl());
				//map.setMapType(G_HYBRID_MAP);				
				map.checkResize();				            

				map.setCenter(new GLatLng(a,b), z);				                
				if(address!=''){
					var geocoder = new GClientGeocoder();
					geocoder.getLatLng(address, function(point){ map.setCenter(point,z); });
				}
				myMarker = createMarker(new GLatLng(a,b)); // Ajout du marqueur
				map.addOverlay(myMarker);        
			}	
			function createMarker(point){
				var marker = new GMarker(point);
				GEvent.addListener(marker, "click", function(latlng) {
					var lat = latlng.lat();
					var lng = latlng.lng();
					var  DegMinSec = convert_DMS(lat,lng);
					marker.openInfoWindowHtml(DegMinSec);
				});
				return marker;
			}         
			
			function convert_DMS(lat,lng){
				var c_lat = getDMS(lat);
				var c_lng = getDMS(lng);			
				var coordonnees = '<b>Lat</b> : '+c_lat+' <br /><b>Lng</b> : '+c_lng;
				return coordonnees;
				

			}
			 
			function getDMS(coord){
				// On r�cup�re les degr�s
				var i1 = Math.floor(coord);
				var r1 = coord - i1;
				// On r�cup�re les minutes
				var r2 = r1 * 60;
				var i2 = Math.floor(r2);
				// On r�cup�re les secondes
				var r3 = r2 - i2;
				var i3 = r3 * 60;
				i3 = Math.floor(i3*100) / 100;
				
				return i1+' &deg; '+i2+' min '+i3+' sec';		
			}
			

			coordonneesGPS();
		</script>

