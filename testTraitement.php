<?php
$debutActivite = '2021-01-20' ;
$finActivite = '2021-02-17' ;
$employeur = 'philippe' ;
$activite = 'super marion' ;
$salaire =  2000 ;

$mysqli = new mysqli('127.0.0.1', 'root', '', 'philippe');
if ($mysqli->connect_errno) {
    echo "Échec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$req = "INSERT INTO orders VALUES ('','$employeur','$activite','$salaire','$debutActivite','$finActivite',DEFAULT)";

// $req = "INSERT INTO orders VALUES ('','philippe','super marion',2000,'2021-01-20','2021-02-17',DEFAULT)";


if (!$mysqli->query($req) ) {
        echo "Echec lors de la creation de la table : (" . $mysqli->errno . ") " . $mysqli->error;
    }













// $conn = mysqli_connect('127.0.0.1', 'root', '', 'philippe');

// $req = "INSERT INTO orders VALUES ('',$employeur,$activite,$salaire,$debutActivite,$finActivite,DEFAULT)";


// try {$conn->query($req);} catch (Exception $e) {$e->getMessage();}

// echo 'Success';