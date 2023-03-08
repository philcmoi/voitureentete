<?php
session_start();
include ('db_config.php');
if (!empty($_COOKIE["token"]) AND !empty($_COOKIE["email"])) {
    
    $mysqli = new mysqli('127.0.0.1', $dbuser, $dbpass, $db);
    
    $token = htmlspecialchars($_COOKIE["token"]);
    
    $email = htmlspecialchars($_COOKIE["email"]);
    
    $sql = "SELECT email, password, token FROM membre WHERE email = '".$email."' and token = '".$token."' ";
    
    if (!$result = $mysqli->query($sql)) {
        
        
    }
    
    if ($result->num_rows === 0) {
        
        
    }
    
    if ($data = mysqli_fetch_array($result))
    { $pass = $data['password'];
    
//     $_SESSION['logged']='bienvenue';
    
    mysqli_close($mysqli);
//     var_dump($email);
    $result->close();
//     if ($email =='lhpp.philippe@gmail.com') {
//         $_SESSION['logged']='admin';
//         header('Location: indexdate.php');
//     } else {
//         $_SESSION['logged']='bienvenue';
//         header('Location: indexdate2.php');}
//     }
//     else {header('Location: index.php?error=1');}
}
}

?>  


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Signin Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form class="form-signin" action="traitement.php" method="post" >
    <img class="mb-4" src="design/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
  <input type="email" name="email" id="floatingInput" class="form-control" placeholder="Entrer votre email" autofocus>
<!--       <label for="floatingInput">Email address</label> -->
    </div>
    <div class="form-floating">
  <input type="password" name="password" id="floatingPassword" class="form-control" placeholder="Password" >
<!--       <label for="floatingPassword">Password</label> -->
    </div>
</br>
<?php 

  if (isset($_GET['error'])) {
  $error=htmlspecialchars($_GET['error']);

switch ($error) {
    case 1:

        echo " Donnees incorrectes ";
        break;
        
    case 2:

        echo " Donnees incorrectes";
        break;
        
    case 3:
        echo "vous avez ete deconnecte";
        break;
        
    case 4:
        echo "New record created successfully";
        break;
              }

  ;}
?>
      
  
    <button class="w-100 btn btn-lg btn-primary" type="submit">S'identifier</button>
    </br>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="rememberme" > Se souvenir de moi
      </label>
      </br> 
    </div>  
    <a href="enregistrement.php" title="S enregistrer" target="_blank" rel="noopener noreferrer">S enregistrer</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
	
  
  </form>
</main>


    
  </body>
</html>
