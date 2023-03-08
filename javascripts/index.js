//<script src="https://maps.google.com/maps/api/js?key=AIzaSyA031jNEP24ibL2gqQpXy-us5hzE_0wkG8"></script>
//<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

//<script type="text/javascript">

$(function(){
//function initMap() {
  var directionsService = new google.maps.DirectionsService();
  var directionsRenderer = new google.maps.DirectionsRenderer();
  var haight = new google.maps.LatLng(37.7699298, -122.4469157);
  var oceanBeach = new google.maps.LatLng(37.7683909618184, -122.51089453697205);
  var mapOptions = {
    zoom: 14,
    center: haight
  }
  var map = new google.maps.Map(document.getElementById('map'), mapOptions);
  directionsRenderer.setMap(map);

  function calcRoute() {
	  var selectedMode = document.getElementById('mode').value;
	  var request = {
	      origin: haight,
	      destination: oceanBeach,
	      // Note that JavaScript allows us to access the constant
	      // using square brackets and a string value as its
	      // "property."
	      travelMode: google.maps.TravelMode[selectedMode]
	  };
	  directionsService.route(request, function(response, status) {
	    if (status == 'OK') {
	      directionsRenderer.setDirections(response);
	    }
	  });
	}
  }
//}

//window.onload = function(){
//	// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
//	initMap(); 
//};
//</script>