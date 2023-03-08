<?php
session_start();
// include database connection file
include('db_config.php');
 
$query = "SELECT * FROM orders ORDER BY order_number desc";
$result = mysqli_query($con, $query);

// $test = $_SESSION['logged'];

// var_dump($_SESSION['logged']);

// if (isset($_SESSION['logged']) && ( $_SESSION['logged'] == "admin" ))
// {} else {header('Location: index.php');}

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
  <div class="container">
    <h4>Date range search with jQuery Datepicker using Ajax, PHP & MySQL - <a href="https://www.cluemediator.com/" target="_blank" rel="noopener noreferrer">Clue Mediator</a></h4>
    </br>
    <div class="col-md-2">
        <input type="text" name="from_date" id="from_date" class="form-control dateFilter" placeholder="Depuis" required autofocus/>
      <script type="text/javascript">
			$(function(){
				$('*[name=from_date]').appendDtpicker({
					"firstDayOfWeek": 1,
// 					"futureOnly": true,
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
// 				"futureOnly": true,
				"minuteInterval": 15,
				"locale": "fr",
				"dateFormat": "YYYY.MM.DD hh:mm"
				
			});
		});
		</script>
      </div>
      <div class="col-md-2">
        <input type="button" name="search" id="btn_search" value="Search" class="btn btn-primary" />
      </div>
<!--       <div class="col-md-2"> -->
<!--         <input type="button" name="add" id="btn_add" value="Add" class="btn btn-primary" /> -->
<!--       </div> -->
<?php 
if (!empty($_COOKIE["token"]) || !empty($_COOKIE["email"]))
{
    echo '
<form action="deconnecter.php" method="post">
<input type="submit" value="deconnexion" class="btn btn-primary"/>
</form>
'
    
;}
?>
      <div id="resultat"></div>
    </div>
    </br>
    <div class="rowprincipal">
      <div class="col-md-8">
        <div id="purchase_order">
          <table class="table table-bordered">
            <tr>
    <th width="5%">Numero de trajet</th>
    <th width="25%">Conducteur</th>
    <th width="20%">Lieu de Depart</th>
    <th width="20%">Lieu de d arrive</th>
    <th width="5%">Participation</th>
    <th width="10%">Date de depart</th>
    <th width="10%">Date d arrive</th>
<!--     <th width="5%">Effacer</th> -->
<!--     <th width="5%">Mise a jour</th> -->
              </tr>
            <?php
            while($row = mysqli_fetch_array($result))
            { $DateTime = DateTime::createFromFormat('Y-m-d', $row["datedepart"]);
            $DateTime2 = DateTime::createFromFormat('Y-m-d', $row["datearrive"]);
//             $row["debutActivite"] = $DateTime->format('d-m-Y');
//             $row["finActivite"] = $DateTime2->format('d-m-Y');
//             $DateTime2 = DateTime::createFromFormat('Y-m-d', $row["end_activity"]);
//             $row["end_activity"] = $DateTime2->format('d-m-Y');
            $date1 = date_create($row[5]);
            $date2 = date_create($row[6]);
            $fmt = numfmt_create( 'ru_RU', NumberFormatter::CURRENCY );
            
            
            ?>
              <tr>
                  <td><?php echo $row["order_number"]; ?></td>
                  <td><?php echo $row["conducteur"]; ?></td>
                  <td><?php echo $row["lieudepart"]; ?></td>
                  <td><?php echo $row["lieuarrive"]; ?></td>
                  <td><?php echo numfmt_format_currency($fmt, $row["participation"], "EUR")."\n"; ?></td>
                  <td><?php echo date_format($date1, 'd/m/Y H:i'); ?></td>
                  <td><?php echo date_format($date2, 'd/m/Y H:i'); ?></td>
              </tr>
            <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
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



		 // différence des heures
		var time_diff = date2.getTime()-date1.getTime();

		// alert("difference");

		// alert("time_diff "+ time_diff);
		 // différence de jours
		var days_Diff = time_diff / (1000 * 3600 * 24);

		 alert("days_Diff "+ days_Diff);

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
 	})

</script>