<?php
session_start();
$test = $_SESSION['logged'];

var_dump($test);

if (isset($_SESSION['logged']) && ( $_SESSION['logged'] == "bienvenue" || $_SESSION['logged'] == "connecte"))
{} else {header('Location: index.php');}

session_destroy();
?>
<!doctype html>
<html>
	<head>
<meta charset="utf8"/>
<title>interation avec les session</title>
	</head>
<body>

<h1>Interagir avec le visiteur: Les sessions</h1>

<?php 
if (!empty($_COOKIE["token"]) && !empty($_COOKIE["email"])) {
echo $_COOKIE["email"]; 
echo'----------------------';
echo $_COOKIE["token"];}
?>


<h1>Bonjour <?php if (!empty($_SESSION['email'])) {echo $_SESSION['email'];} ?></h1>

<?php
if (!empty($_COOKIE["token"]) || !empty($_COOKIE["email"])) 
{
echo '
<form action="deconnecter.php" method="post">
<input type="submit" value="deconnexion"/>
</form>
';}
?>

</body>
</html>
