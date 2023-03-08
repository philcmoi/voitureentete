<?php
//session_start();
// include database connection file
//include('db_config.php');
 
//$query = "SELECT * FROM orders ORDER BY order_number desc";
//$result = mysqli_query($con, $query);

// $test = $_SESSION['logged'];

//var_dump($_SESSION['logged']);

//if (isset($_SESSION['logged']) && ( $_SESSION['logged'] == "admin" ))
//{} else {header('Location: index.php');}

// session_destroy();
?>
 
<html>
 
<head>
  <title>Date range search with jQuery Datepicker using Ajax, PHP & MySQL - Clue Mediator</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
 
  <meta charset="utf-8" />
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="i18n/datepicker-fr.js"></script>

<!--    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>   -->
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>   -->
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>  -->
<!-- <meta charset="ISO-8859-1"> -->
<style> .valeur
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
</style>

	<title>Demo - jquery-simple-datetimepicker</title>

	<!--Requirement jQuery-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<!--Load Script and Stylesheet -->
	<script type="text/javascript" src="jquery.simple-dtpicker.js"></script>
	<link type="text/css" href="jquery.simple-dtpicker.css" rel="stylesheet" />
	<!---->

	<style type="text/css">
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
</head>
 
<body>
<form id ="coffre2" action="#" method="post">
<div class="container">
   
    </br>
    <div class="row">
      <div class="col-md-2">
        <input type="text" name="from_date" id="from_date" class="form-control dateFilter" placeholder="Depuis" required autofocus/>
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
        <input type="text" name="to_date" id="to_date" class="form-control dateFilter" placeholder="Jusqu'&aacute;" required />
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
	  <div class="col-md-2">
      <input type="text"  id="conducteur" class="form-control" placeholder="Nom du conducteur" required ></br>
	  <input type="text"  id="lieudepart" class="form-control" placeholder="lieu de depart" required ></br>
	  <input type="text"  id="lieuarrive" class="form-control" placeholder="lieu  d arrive" required ></br>
	  <input type="text"  id="participation" class="form-control" placeholder="Entrer la participation propose" required ></br>
	  <button type="submit" id="envoyer" title="Envoyer" class="btn btn-primary">Valider</button>
      <button type="reset" id="reset" title="reset" class="btn btn-primary">Reinitialiser</button></div>
      <button id="deconnexion" class="btn btn-primary" title="deconnexion">Quiter cette fenatre</button>
      
     
     <?php 
// if (!empty($_COOKIE["token"]) || !empty($_COOKIE["email"]))
// {
//     echo '
// <form action="deconnecter.php" method="post">
// <input type="submit" value="deconnexion" class="btn btn-primary"/>
// </form>
// '
// ;}
 ?>
     <br>
     <div id="resultat"></div>
   </div>
</div>
</br>
</form>

</body>
</html>
<script type="text/javascript">

$(document).ready(function () {

$("#coffre2").submit(function( event ) {
	event.preventDefault();

	  var from_date = $('#from_date').val();
	  var to_date = $('#to_date').val();
// 	  alert("from_date "+from_date);
// 	  alert("to_date "+to_date);


	  
	  var date1 = new Date(from_date);
	  var date2 = new Date(to_date);

	  

// 	  alert("date1 "+date1);
// 	  alert("date2 "+date2);
	   // diff�rence des heures
	  var time_diff = date2.getTime()-date1.getTime();
	  
// 	  alert("difference");
	  
// 	  alert("time_diff "+ time_diff);
	   // diff�rence de jours
	  var days_Diff = time_diff / (1000 * 3600 * 24);
	  
// 	   alert("days_Diff "+ days_Diff);
	   
	  if (days_Diff < 0) {alert("dates invalide");}
	  else {
	  
	var  conducteur = $('#conducteur').val();
	var  lieudepart = $('#lieudepart').val();
	var  lieuarrive = $('#lieuarrive').val();
	var  participation = $('#participation').val();
	var datedepart = $('#from_date').val();
	var datearrive = $('#to_date').val();

	alert('datedepart '+datedepart);
	alert('datearrive' +datearrive);

	
$.post('traitementactivite.php', {
	conducteur: $('#conducteur').val(),
	lieudepart: $('#lieudepart').val(),
	lieuarrive: $('#lieuarrive').val(),
	participation: $('#participation').val(),
	datedepart: datedepart,
	datearrive: datearrive
      
  },  
  function(data){
  	 
      if(data == "Success"){
           // Le membre est connect�. Ajoutons lui un message dans la page HTML.
           $("#resultat").html("<p>L ajout a ete effectuer avec succes ! </p><br><p>Vous allez etre rediriger sur la liste des activite");
           setTimeout(function() {$('#resultat').fadeOut();document.location.href = 'indexdate.php'}, 3000);
//            setTimeout(function(){ document.location.href = 'indexdate.php'; }, 2000);
          
           
      }

      
else  {		
           $("#resultat").html("<p>Erreur lors de la connexion...</p>");alert(data);
      }
	  },
      'text'
	  );
}

});
// $('#btn_add').click(function () {
// 	<form id="coffre" action="#" method="post">
// 	<input type="email"  id="mail" class="form-control" placeholder="Entrer votre email" required autofocus>


//     window.location.href = 'ajouterActivite.php';
   
// });
$('#deconnexion').click(function () {
	
    window.location.href = 'indexdate.php';
   
});


$("#reset").click(function () {$("#resultat").empty();});

});
</script>