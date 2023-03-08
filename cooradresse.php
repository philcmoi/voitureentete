 <?php
session_start();
include('db_config.php');
 
$query = "SELECT * FROM orders ORDER BY order_number desc";
$result = mysqli_query($con, $query);

// $test = $_SESSION['logged'];

// var_dump($_SESSION['logged']);

// if (isset($_SESSION['logged']) && ( $_SESSION['logged'] == "bienvenue" || $_SESSION['logged'] = 'admin' ))
// {} else {header('Location: index.php');}

// // session_destroy();
// ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
		<script src="javascripts/jquery.js"></script>		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="javascripts/jquery.js"></script>
		<script type="text/javascript" src="javascripts/jquery.googlemap.js"></script>
		<script src="https://m&libraries=geometry&sensor=false"></script>
		<script src="http://openlayers.org/api/OpenLayers.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  		<script src="i18n/datepicker-fr.js"></script>
		<!--Requirement jQuery-->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	    <!--Load Script and Stylesheet -->
		<script type="text/javascript" src="jquery.simple-dtpicker.js"></script>
		<link type="text/css" href="jquery.simple-dtpicker.css" rel="stylesheet" />
	   <!---->
		
		<style type="text/css">
		.valeur
            {
              background-color: lightblue; 
                text-align: center;
            }
          
          #masquesaisie 
            { 
				border: solid;
             	width:70px; 
             	height:15px;
            } 
          .rowprincipal
          {
          background-color: lightblue;
                text-align: center;
          }
		body { background-color: #fefefe; padding-left: 2%; padding-bottom: 100px; color: #101010; }
		footer{ font-size:small;position:fixed;right:5px;bottom:5px; }
		a:link, a:visited  { color: #0000ee; }
		pre{ background-color: #eeeeee; margin-left: 1%; margin-right: 2%; padding: 2% 2% 2% 5%; }
		p { font-size: 0.9rem; }
		ul { font-size: 0.9rem; }
		hr { border: 2px solid #eeeeee; margin: 2% 0% 2% -3%; }
		h3 { border-bottom: 2px solid #eeeeee; margin: 2rem 0 2rem -1%; padding-left: 1%; padding-bottom: 0.1em; }
		h4 { border-bottom: 1px solid #eeeeee; margin-top: 2rem; margin-left: -1%; padding-left: 1%; padding-bottom: 0.1em; }
	   </style>
		
		<script async type="text/javascript">
			// On initialise la latitude et la longitude de Paris (centre de la carte)
		var lat = 48.852969;
		var lon = 2.349903;
		var lng = 2.349903;
		var map = null;
		var nbrevent = 0;
		var marqueur = null;
		var markersArray = [];
		var geocoder;
		var marker;
		var latlng;
		var coor;
		var infoWindow;
		var infoWindowOptions;
		var infoArray = [];
		var directionsDisplayArray = [];
		var directionsService;
		var directionsRenderer = [];
// 		var depart;
// 		var arrive;
		var ville = [];
		var participation;
		var calcroute = false;
		var villedepart;
		var villearrive;
// 		function initMap() {
		$(document).ready(function() {	
		// Cr�er l'objet "map" et l'ins�rer dans l'�l�ment HTML qui a l'ID "map"
		map = new google.maps.Map(document.getElementById("map"), {
		// Nous pla�ons le centre de la carte avec les coordonn�es ci-dessus
		center: new google.maps.LatLng(lat, lon), 
		// Nous d�finissons le zoom par d�faut
		zoom: 11, 
		// Nous d�finissons le type de carte (ici carte routi�re)
		mapTypeId: google.maps.MapTypeId.ROADMAP, 
		// Nous activons les options de contr�le de la carte (plan, satellite...)
		mapTypeControl: true,
		// Nous d�sactivons la roulette de souris
//		scrollwheel: false, 
		mapTypeControlOptions: {
		// Cette option sert � d�finir comment les options se placent
		style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR 
		},
		// Activation des options de navigation dans la carte (zoom...)
		navigationControl: true, 
		navigationControlOptions: {
		// Comment ces options doivent-elles s'afficher
		style: google.maps.NavigationControlStyle.ZOOM_PAN 
		}
			});
			

		google.maps.event.addListener(map, 'click', function (event) {
					
		if (nbrevent < 2)
		{
		marqueur = new google.maps.Marker({
		map: map,
		draggable : true,
		position: new google.maps.LatLng(event.latLng.lat(), event.latLng.lng()),
		});

		markersArray.push(marqueur);
		coor = event.latLng;
		console.log("lat = " + event.latLng.lat());
		console.log("long = " + event.latLng.lng());
		
		lat = event.latLng.lat();
		lng = event.latLng.lng();
		 	
		infoWindow = new google.maps.InfoWindow({ });
		inverseCoord(marqueur , coor, infoWindow );
		nbrevent = nbrevent + 1;
		}
		});

		
				
		function inverseCoord(marker,latlng,infowindow) {
		geocoder = new google.maps.Geocoder();
		geocoder.geocode({'latLng': latlng}, function(results, status) {
		/* Si le g�ocodage invers� a r�ussi */
		if (status == google.maps.GeocoderStatus.OK) {
		if (results[2]) {
		map.setZoom(11);

		var elt = results[0].address_components;

		ville[nbrevent] = elt[2].long_name;
		console.log(elt[2].long_name);
		
		
		/* Affichage de l'infowindow sur le marker avec l'adresse r�cup�r�e */
		infowindow.setContent(results[4].formatted_address);
		infowindow.open(map, marker);
		google.maps.event.addListener(marker,'click', infoCallback(infowindow, marker));

// 		google.maps.event.addListener(marker, 'dragstart', function(event) {
       
// 		if (coor == markersArray[0].getPosition()) {console.log("markersArray 1"); marker = markersArray[0];}
// 		else {console.log("markersArray 2");marker = markersArray[1];}
// 	    inverseCoord(marker,latlng,infowindow);
// 		})

		google.maps.event.addListener(marker, 'dragend', function(event) {
        
		latlng = event.latLng;

	    inverseCoord(marker,latlng,infowindow);

		
	    });
				    
		}
		} else {
		alert("Le geocodage a echoue pour la raison suivante : " + status);
				}
		})
		}


		function calcRoute()  {
			
		directionsService = null;
		directionsRenderer = null;
		depart = new google.maps.LatLng(markersArray[0].getPosition());
		arrive = new google.maps.LatLng(markersArray[1].getPosition());
			
		directionsService = new google.maps.DirectionsService();
		directionsRenderer = new google.maps.DirectionsRenderer();
		    
		directionsRenderer.setMap(map);
		directionsDisplayArray = [];	
			
		var request = {
		    origin: depart,
		    destination: arrive,
			travelMode: 'DRIVING'
			           };
		directionsService.route(request, function(result, status) {
		if (status == 'OK') {
		directionsRenderer.setDirections(result);
		directionsDisplayArray.push(directionsRenderer);
		calcroute = true;nbrevennt = 0;
		alert("succes");
		} else {alert("echec");}
		});
		}

		
		$('#enregistreritineraire').click(function () {				  

		if (nbrevent == 2 && calcroute == true) 
		{

		departMarkerlatlng = new google.maps.LatLng(markersArray[0].getPosition());
		arriveMarkerlatlng = new google.maps.LatLng(markersArray[1].getPosition());

		geocoder = new google.maps.Geocoder();
		geocoder.geocode({'latLng': departMarkerlatlng}, function(results, status) {
		/* Si le g�ocodage invers� a r�ussi */
		if (status == google.maps.GeocoderStatus.OK) {
		if (results[2]) {
		
		var elt = results[0].address_components;

		villedepart = elt[2].long_name;
		console.log("ville de depart "+villedepart);
						}
													 } 


		geocoder = new google.maps.Geocoder();
		geocoder.geocode({'latLng': arriveMarkerlatlng}, function(results, status) {
		/* Si le g�ocodage invers� a r�ussi */
		if (status == google.maps.GeocoderStatus.OK) {
		if (results[2]) {
		
		var elt = results[0].address_components;

		villearrive = elt[2].long_name;
		console.log("ville d arrive "+villearrive);
		
						}
													 } 

		if (!confirm("Voulez vous ENREGISTRER DEFINITIVEMENT l itineraire")) {}
		else {
			participation = $('#participation').val();
			datedepart = $('#from_date').val();
			datearrive = $('#to_date').val();
			
			if (villedepart&&villearrive&&participation&&datedepart&&datearrive) {

			$.ajax({
				  type: "POST",
				  url: "enregistreritineraire.php",
				  cache : false,
				  data: {
					depart: villedepart,
				  	arrive: villearrive,
				  	participation : participation,
				  	datedepart : datedepart,
		  			datearrive : datearrive,
		  			latDepart : departMarkerlatlng.lat(),
  					longDepart : departMarkerlatlng.lng(),
  					latArrive : arriveMarkerlatlng.lat(),
  					longArrive : arriveMarkerlatlng.lng()
				  		},
				  dataType: "text",
				    "success": function (data, textStatus, jqXHR) {
				        console.log("L'appel Ajax est une r�ussite.");
// 				        alert("longArrive " + longArrive);
				        $("#resultat").html("<p>L ajout a ete effectuer avec succes ! </p><br><p>Vous allez etre rediriger sur la liste des activite");
				        setTimeout(function() {$('#resultat').fadeOut(2000,traitement_callback("hello world"));document.location.href = 'indexdate.php'}, 3000);
				        
// 		     		    $('#resultat').fadeOut(2000,traitement_callback("hello world"));
				    },
				    "error": function (jqXHR, textStatus, errorThrown) {
				        console.log("L'appel Ajax est un �chec.");
				        $("#resultat").html("<p>Erreur lors de la connexion...</p>");
				    }
				});

			

		    }

			else {alert("Veuilliez saisir tout les champs");}
		}

																					}
						)




																						}
						)
		
		
		

						
		

		nbrevent = 0; calcroute = false;
		
		}
		})
				
		function traitement_callback(in_text){
			   console.log(in_text);
			}
		
		
		
		function clearOverlays() {
		for (var i = 0; i < markersArray.length; i++ ) {
		this.markersArray[i].setMap(null);
				}
		markersArray = [];
		markersArray.length = 0;
			  }
		
		$('#delete').click(function () {
		 clearOverlays()
		 nbrevent = 0;
				})

		$('#deconnexion').click(function () {
		 clearOverlays()
		 nbrevent = 0;
		 document.location.href = 'deconnecter.php';
				})
				
				
	function infoCallback(infowindow, maker) {
	return function() { infowindow.open(map, maker); };
											  }
	
	

		
	function effacerItineraire() {
		for (var i = 0; i < directionsDisplayArray.length; i++ ) {
				directionsDisplayArray[i].setMap(null);
				directionsDisplayArray[i].setPanel(null);
				
				}
		for (var i = 0; i < markersArray.length; i++ ) {
				markersArray[i].setMap(null);
					
				}

		directionsDisplayArray = [];
		markersArray = [];
		directionsDisplayArray.length = 0;
		markersArray.length = 0;
		nbrevent = 0;
		calcroute = false;
		alert("fin effacerItineraire");}	
	
	
		$('#caculitineraire').click(function () {
//             markersArray;
			calcRoute();
		
		})
		
		$('#effaceritineraire').click(function () {				  
			effacerItineraire();
		});
		
	
		
})
/* fin du code javascript */
			
			
// 			window.onload = function(){
// 				// Fonction d'initialisation qui s'ex�cute lorsque le DOM est charg�
// 				initMap(); 
// 			};


		
		</script>
		
		<style type="text/css">
			#map{ /* la carte DOIT avoir une hauteur sinon elle n'appara�t pas */
				height:400px;
			}
		</style>
		<title>Carte</title>
	</head>
	<body>
		<div id="map">
			<!-- Ici s'affichera la carte -->
		</div>
		<div class="col-md-2">
        <input type="button" name="delete" id="delete" value="effacer les rdv" class="btn btn-primary" />
      </div>
      <div class="col-md-2">
        <input type="button" name="caculitineraire" id="caculitineraire" value="caculitineraire" class="btn btn-primary" />
      </div>
      <div class="col-md-2">
        <input type="text" name="participation" id="participation" placeholder="participation demander" />
      </div>
      <div class="col-md-2">
        <input type="button" name="enregistreritineraire" id="enregistreritineraire" value="enregistrer l itineraire" class="btn btn-primary" />
      </div>
      <div class="col-md-2">
        <input type="button" name="effaceritineraire" id="effaceritineraire" value="Effacer l itineraire" class="btn btn-primary" />
      </div>
      <div class="col-md-2">
        <input type="button" name="deconnexion" id="deconnexion" value="deconnexion" class="btn btn-primary" />
      </div>
      <div class="col-md-2">
        <input type="text" name="from_date" id="from_date" class="form-control dateFilter" placeholder="Depuis" required/>
      <script type="text/javascript">
			$(function(){
				$('*[name=from_date]').appendDtpicker({
					"firstDayOfWeek": 1,
					"futureOnly": true,
					"minuteInterval": 15,
					"locale": "fr",
					"dateFormat": "YYYY.MM.DD hh:mm"
					
				});
			});
		</script>
      </div>
      <div class="col-md-2">
      <input type="text" name="to_date" id="to_date" class="form-control dateFilter" placeholder="Depuis" required />
      <script type="text/javascript">
			$(function(){
				$('*[name=to_date]').appendDtpicker({
					"firstDayOfWeek": 1,
					"futureOnly": true,
					"minuteInterval": 15,
					"locale": "fr",
					"dateFormat": "YYYY.MM.DD hh:mm"
					
				});
			});
		</script>
      </div>
      <div id="resultat" class="col-md-2"></div>
	</body>
</html>