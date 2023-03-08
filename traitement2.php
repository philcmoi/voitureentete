<?php
session_start();

include ('db_config.php');


$email = htmlspecialchars( $_POST["email"]) ;
$password = htmlspecialchars($_POST["password"]);

$password2 = htmlspecialchars($_POST["password2"]);

// $pass=sha1($password2);
$pseudo = htmlspecialchars($_POST["pseudo"]);
// $prenom = htmlspecialchars($_POST["prenom"]);

$pass = password_hash($password, PASSWORD_DEFAULT);

// echo 'mot de passe ----->';echo($pass);
// echo 'mot de passe ----->';echo($pass2);


$_SESSION["email"] = $email;
$_SESSION["pseudo"] = $pseudo;

$_SESSION["password"] = $password;
$_SESSION["logged"] = 'traitement2';



$mysqli = new mysqli('127.0.0.1', $dbuser, $dbpass, $db);



$token = rand();


$sql = "SELECT email FROM membre WHERE email = '".$email."'";

$sql1 = "SELECT pseudo FROM membre WHERE pseudo = '".$pseudo."'";

$sql2 = "INSERT INTO membre (idmembre, email, pseudo,token,password)
VALUES (NULL,'$email', '$pseudo','$token','$pass')";

$result = $mysqli->query($sql);
    
    /* D�termine le nombre de lignes du jeu de r�sultats */
    $row_cnt = $result->num_rows;
    
    $result1 = $mysqli->query($sql1);
    $row_cnt1 = $result1->num_rows;
    
    if ($row_cnt != 0) {header('Location: enregistrement.php?erreure=1');


    }
    elseif ($row_cnt1 != 0) {header('Location: enregistrement.php?erreure=2');}

    elseif ($password != $password2)
    {header('Location: enregistrement.php?erreure=3');}
    else {
    $mysqli->query("INSERT INTO membre (idmembre, email, pseudo,token,password)
VALUES (NULL,'$email', '$pseudo','$token','$pass')");
        
    header('Location: index.php?error=4');  }
    
 
    
    
        
    $mysqli->close();


    
    /* Ferme le jeu de r�sultats */
    $result->close();
    $result1->close();
?>