<?php
// include database connection file
include('db_config.php');

// $DateTime = DateTime::createFromFormat('d-m-Y', $_POST["debutActivite"]);
// $_POST["debutActivite"] = $DateTime->format('Y-m-d');

// $DateTime = DateTime::createFromFormat('d-m-Y', $_POST["finActivite"]);
// $_POST["finActivite"] = $DateTime->format('Y-m-d');

if(isset($_POST["datedepart"], $_POST["datearrive"])) {
    $orderData = '';
    
    $query = "SELECT * FROM orders WHERE datedepart BETWEEN '".$_POST["datedepart"]."' AND '".$_POST["datearrive"]."'ORDER BY order_number desc ";
    $result = mysqli_query($con, $query);

    $orderData .='
    <html>
 
<head>

 
 <meta charset="utf-8" />
 

</head>
 
<body>
  
    <div class="row">
      <div class="col-md-8">
        <div id="purchase_order">
    <table class="table table-bordered">
    <tr>
    <th width="5%">Numero d ordre</th>
    <th width="30%">conducteur</th>
    <th width="15%">lieudepart</th>
    <th width="15%">lieuarrive</th>
    <th width="15%">participation</th>

    <th width="10%">date de depart</th>
    <th width="10%">date d arrive</th>
    <th width="5%">Effacer</th>
    <th width="5%">Mise a jour</th>
    </tr>';

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        { 

        $date1 = date_create($row[5]);
        $datedepart = date_format($date1, 'd/m/Y H:i');
            
        $date2 = date_create($row[6]);
        $datearrive = date_format($date1, 'd/m/Y H:i');
        
        $fmt = numfmt_create( 'ru_RU', NumberFormatter::CURRENCY );
            
//             $DateTime = DateTime::createFromFormat('Y-m-d', $row["debutActivite"]);
//             $row["debutActivite"] = $DateTime->format('d-m-Y');
            $orderData .='
            <tr>
            <td>'.$row["order_number"].'</td>
            <td>'.$row["conducteur"].'</td>
            <td>'.$row["lieudepart"].'</td>
            <td>'.$row["lieuarrive"].'</td>
            <td>'.numfmt_format_currency($fmt, $row["participation"], "EUR")."\n".'</td>
            <td>'.$datedepart.'</td>
            <td>'.$datearrive.'</td>
            <td width="5%">Effacer</td>
            <td width="5%">Mise a jour</td>
            </tr>';
        }
    }
    else
    {
        $orderData .= '
        <tr>
        <td colspan="5">No Order Found</td>
        </tr>';
    }
    $orderData .= '</table>';
    echo $orderData;

    
}
?>
<script type="text/javascript">
$(document).ready(function () {

	function formatDate(date) {
	     var d = new Date(date),
	         month = '' + (d.getMonth() + 1),
	         day = '' + d.getDate(),
	         year = d.getFullYear();

	     if (month.length < 2) month = '0' + month;
	     if (day.length < 2) day = '0' + day;

	     return [day, month, year].join('-');
	 }
	
$('#btn_search').click(function () {

var from_date = $('#from_date').val();
var to_date = $('#to_date').val();

// fromdatechanged = formatDate(from_date);
// todatechanged = formatDate(to_date);

// $('#from_date').val(fromdatechanged);
// $('#to_date').val(todatechanged);



var date1 = new Date(from_date);
var date2 = new Date(to_date);



 // diff�rence des heures
var time_diff = date2.getTime()-date1.getTime();

// alert("difference");

// alert("time_diff "+ time_diff);
 // diff�rence de jours
var days_Diff = time_diff / (1000 * 3600 * 24);

//  alert("days_Diff "+ days_Diff);

	   if (days_Diff < 0) {alert("dates invalide");}
	   	  else {

	   		$.post('action.php',
	   			    {
	   			datedepart: from_date,
	   			datearrive: to_date
	   			    }, function(data) {
	   			        $('#purchase_order').html(data);
	   			});

	   	  }
});



$('#btn_add').click(function () {
    window.location.href = 'ajouteractivite.php';
   
});

// if (confirm('Some message')) {
//     alert('Thanks for confirming');
// } else {
//     alert('Why did you press cancel? You should have confirmed');
// }



$("table tr").on("click",function () {


	var identifiant = $(this).find('td:first').html();

// 	alert ("$(this).find('td:first').html()  "+identifiant);
	
	alert(identifiant);

	var clickedCell=$(event.target);

//     alert("clickedCell "+clickedCell.text());

		
 	var compar = clickedCell.text();
 	alert(compar+ ' ok');

 	if(compar == 'Effacer' &&  identifiant != null){
	if (confirm('Voulez vous effacer la ligne choisie')) {

$.post('supprimeractivite.php', {
	identifiant : identifiant,
								},
								
    function(data){

        if (data == "Success") {           
            $("#resultat").html(" ! <p>Vous allez etre rediriger sur la liste des activite</p>");
            setTimeout(function() {$('#resultat').fadeOut();document.location.href = 'indexdate.php'}, 3000);
        	
            } 
        else {
            $("#resultat").html("<p>Erreur lors de la connexion...</p>");
    	    }
	        },
	        'text'
	        );
	}
	else {};
}

 	if(compar == 'Mise a jour'){
 		localStorage.setItem("cleef",identifiant);
// 	 		alert("identifiant "+identifiant);
// 	 		verif = localStorage.getItem("cleef");
// 	 		alert("verif "+ verif);
	 		if (identifiant != null) {
 		if (confirm('Voulez vous modifier les donnee de la ligne choisie')) {
 	 		localStorage.setItem("cleef",identifiant);
 	 		alert("identifiant "+identifiant);
 	 		verif = localStorage.getItem("cleef");
//  	 		alert("verif "+ verif);
 		    window.location.href = 'update.php';}

//  	$.post('Update.php', {
//  		identifiant : identifiant,
//  									},
 									
//  	    function(data){

//  	        if (data == "Success") {           
//  	            $("#resultat").html(" ! <p>Vous allez etre rediriger sur la liste des activite</p>");
//  	            setTimeout(function() {$('#resultat').fadeOut();document.location.href = 'indexdate.php'}, 3000);
 	        	
//  	            } 
//  	        else {
//  	            $("#resultat").html("<p>Erreur lors de la connexion...</p>");
//  	    	    }
//  		        },
//  		        'text'
//  		        );
 		}
//  		else {};
 	}
 	
});

})
</script>
