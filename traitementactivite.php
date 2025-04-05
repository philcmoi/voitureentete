<?php
if(isset($_POST["conducteur"], $_POST["lieudepart"], $_POST["lieuarrive"],$_POST["participation"],$_POST["datedepart"], $_POST["datearrive"] )) {

// $order_number = NULL;
$conducteur = htmlentities($_POST['conducteur']) ;
$lieudepart = htmlentities($_POST['lieudepart']);
$lieuarrive = htmlentities($_POST['lieuarrive']);
$participation = htmlentities($_POST['participation']);
$datedepart = $_POST['datedepart'];
$datearrive = $_POST['datearrive'];

  try {
    
      
      //$PDO = new PDO(mysql:host=localhost;dbname=philippe,'root','');
      $PDO = new PDO("mysql:host=localhost;dbname=philippe",'root','');

      $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
      $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

      $sql = "INSERT INTO orders (conducteur, lieudepart, lieuarrive, participation, datedepart, datearrive)
VALUES (:conducteur,:lieudepart,:lieuarrive,:participation,:datedepart,:datearrive)";
      
      
    $req = $PDO->prepare($sql);
    
    $PDO->query('SET foreign_key_checks = 0');
    //do some stuff here
    
    
    $req->execute(array(
        
        "conducteur" => $conducteur,
        
        "lieudepart" => $lieudepart,
        
        "lieuarrive" => $lieuarrive,
        
        "participation" => $participation,
        
        "datedepart" => $datedepart,
        
        "datearrive" => $datearrive
        
    ));
    $PDO->query('SET foreign_key_checks = 1');
    
  }
catch(Exception $e)

{
    echo '.$e->getMessage().';
//     die('Erreur : '.$e->getMessage());
    
}

echo 'Success';
}
