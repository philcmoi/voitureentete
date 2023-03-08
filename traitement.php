<?php session_start();
// setcookie("email",$email, time() + 365*24*3600,'/','localhost',false,true);
// setcookie("token",$token, time() + 365*24*3600,'/','localhost',false,true);

include('db_config.php');
$email = htmlspecialchars( $_POST['email']) ;
$password = htmlspecialchars( $_POST['password']);
  
        
    
    $_SESSION['password'] = $password;
    $_SESSION['logged'] = 'bienvenue';
            
//     $mysqli = new mysqli('127.0.0.1', 'u909244959_philippe', 'l@99339RWFH5465', 'u909244959_wroomwroom');

//     $mysqli = new mysqli('127.0.0.1', 'u909244959_philippe', 'l@99339RWFH5465', 'u909244959_wroomwroom');
    echo "avant new sqli";
    $mysqli = new mysqli('127.0.0.1', $dbuser, $dbpass, $db);
    
    echo "apres sqli";
    
   //On cr�� la requ�te
//    $req="SELECT login, password FROM jeux_video WHERE login =.'.$var.'. AND password =.'.$password.'";

    $sql = "SELECT email, idmembre, token, password , pseudo FROM membre WHERE email = '".$email."'";
    
//     $sql = "SELECT email. token FROM membre WHERE email = '".$email."'";
    /* Requ�te "Select" retourne un jeu de r�sultats */

    
   if (!$result = $mysqli->query($sql)) {
      
        header('Location: index.php?error=1');
// var_dump($result);
//       echo " Donnees incorrectes ";
   }

   if ($result->num_rows === 0) {
      
       header('Location: index.php?error=1');
//        var_dump($result);
       
//       echo " Donnees incorrectes ";
   }
        
  if ($data = mysqli_fetch_array($result))
  {
      $pass = $data['password'];
      $token = $data['token'];
      $_SESSION['idmembre'] = $data['idmembre'];
      var_dump($_SESSION['idmembre']);
      $_SESSION['pseudo ']= $data['pseudo '];
      if (password_verify($password , $pass)) {
      $_SESSION['email'] = $email;
        
             {
                 if (isset($_POST["rememberme"]))
                {

                    
                    setcookie("email",$email, time() + 365*24*3600,'/','localhost',false,true);
                    setcookie("token",$token, time() + 365*24*3600,'/','localhost',false,true);
                    
                    
                    print_r($_COOKIE);
                    
                }
          

            }
            mysqli_close($mysqli);
            
            $result->close();
            if ($email == 'lhpp.philippe@gmail.com') {
                $_SESSION['logged'] ='admin';
                header('Location: indexdate.php');
            }
            else {
                $_SESSION['logged'] ='bienvenue';
                header('Location: cooradresse.php');} ;
      } else {header('Location: index.php?error=1');};
  }

     
  
?>    
