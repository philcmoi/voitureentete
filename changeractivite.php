<?php

if (isset($_POST['order_number'],$_POST['conducteur'],$_POST['conducteur'],$_POST['lieudepart'],$_POST['lieuarrive'],$_POST['participation'],$_POST['datedepart'],$_POST['datearrive'])) {
    $order_number = $_POST['order_number'];
    $conducteur = $_POST['conducteur'];
    $lieudepart = $_POST['lieudepart'];
    $lieuarrive = $_POST['lieuarrive'];
    
    $participation = $_POST['participation'];
 
    $datedepart = $_POST['datedepart'];
    $datearrive = $_POST ['datearrive'];
//     $idtrajet = 0;
//     $idmembre = 0;
    
    try {
        $PDO = new PDO("mysql:host=localhost;dbname=philippe",'root','');

        //$pdo = new PDO('mysql:host=localhost;dbname=philippe','root','');
        //$PDO = new PDO('mysql:host=localhost;dbname=u909244959_lhpp','u909244959_lhpp','l@99339RWFH5465');
        $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
//       $pdo = new PDO('mysql:host=localhost;dbname=philippe','root','');
       
//       $sql = "UPDATE orders SET conducteur=? , lieudepart=?, lieuarrive=?, participation=?, datedepart =?, datearrive =?, idtrajet =?  where order_number =?";
      
      $sql = "UPDATE orders SET conducteur = :conducteur , lieudepart = :lieudepart, lieuarrive = :lieuarrive, participation = :participation, datedepart = :datedepart, datearrive = :datearrive WHERE order_number = :order_number";

//       UPDATE `orders` SET `conducteur` = 'PAS MOI', `lieudepart` = 'pekin', `lieuarrive` = 'Tapei', `participation` = '800', `datearrive` = '2022-09-30 09:23:00' WHERE `orders`.`order_number` = 108;

      $req = $PDO->prepare($sql);
      
//       UPDATE `orders` SET `conducteur` = 'Philippe', `lieudepart` = 'Paris', `lieuarrive` = 'Pekin', `participation` = '500' WHERE `orders`.`order_number` = 46; 
//       $stmt = $pdo->prepare($sql)->execute([$conducteur, $lieudepart, $lieuarrive, $participation, $datedepart, $datearrive, $idtrajet, $identifiant]);
      $req->execute(array(
          
          "conducteur" => $conducteur,
          
          "lieudepart" => $lieudepart,
          
          "lieuarrive" => $lieuarrive,
          
          "participation" => $participation,
          
          "datedepart" => $datedepart,
          
          "datearrive" => $datearrive,
          
          "order_number" => $order_number
          
//           "idtrajet" => $idtrajet,
          
//           "idmembre" => $idmembre
          
      ));
      
    } catch (Exception $e) {
        echo('Erreur :'.$e->getMessage());
    }

    echo "Success";
    

}