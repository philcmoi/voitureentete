<?php
// if(isset($_POST["depart"], $_POST["arrive"],$_POST["participation"],$_POST["datedepart"], $_POST["datearrive"], $_POST["latDepart"], $_POST["longDepart"] , $_POST["latDepart"], $_POST["longArrive"]))
// { 

$lieuDepart = $_POST["depart"];
$lieuArrive = $_POST['arrive'];
$participation = $_POST['participation'];
//     $lieuDepart = "Paris";
//     $lieuArrive = "Bordeaux";
//     $participation = "50.0";
$datedepart = $_POST['datedepart'];
$datearrive = $_POST['datearrive'];
$latDepart = $_POST["latDepart"];
$longDepart = $_POST["longDepart"];
$latArrive = $_POST["latArrive"];
$longArrive = $_POST["longArrive"];

try {
    
    $PDO = new PDO('mysql:host=localhost;dbname=u909244959_lhpp','u909244959_lhpp','l@99339RWFH5465');
    $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    
    $sql = "INSERT INTO trajet (depart, arrive, latDepart, longDepart, latArrive, longArrive) VALUES (:depart,:arrive,:latDepart, :longDepart, :latArrive, :longArrive)";
    
//     $sql = "INSERT INTO trajet (depart, arrive) VALUES (:depart,:arrive)";
    
        
    $req = $PDO->prepare($sql);
    
    $req->execute(array(
        
      
        "depart" => $lieuDepart,
        
        "arrive" => $lieuArrive,
        
         "latDepart" => $latDepart,
        
        "longDepart" => $longDepart,
        
        "latArrive" => $latArrive,
        
        "longArrive" => $longArrive
        
        
    ));

    $PDO = new PDO('mysql:host=localhost;dbname=philippe','root','');
    $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

$sql = "INSERT INTO orders (conducteur, lieudepart, lieuarrive, participation, datedepart, datearrive) VALUES (:conducteur,:lieudepart,:lieuarrive,:participation,:datedepart,:datearrive)";

// $sql = "INSERT INTO orders (conducteur, lieudepart, lieuarrive, participation) VALUES (:conducteur,:lieudepart,:lieuarrive,:participation)";

$req = $PDO->prepare($sql);


    $req->execute(array(
        
        "conducteur" => "anatta",
        
        "lieudepart" => $lieuDepart,
        
        "lieuarrive" => $lieuArrive,
        
        "participation" => $participation,
        
        "datedepart" => $datedepart,
        
        "datearrive" => $datearrive
        
    ));
    
}
catch(PDOException $e){
    die("Erreur d'insertion :".$e->getMessage());
}
// }
// else {throw new Exception('Erreur ');
// echo "ERREUR";}