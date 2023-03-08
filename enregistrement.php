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
  <form class="form-signin" action="traitement2.php" method="post" >
    <img class="mb-4" src="design/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Enregistrez vous</h1>

    <div class="form-floating">
  <input type="email" name="email" id="floatingInput" class="form-control" placeholder="Entrer votre email" required autofocus>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
  <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="pseudo" required>
      <label for="floatingPassword">pseudo</label>
    </div>
    <div class="form-floating">
  <input type="password" name="password" id="floatingPassword" class="form-control" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
  <input type="password" name="password2" id="floatingPassword2" class="form-control" placeholder="Password" required>
      <label for="floatingPassword">Password de verication</label>
    </div>
    </br>
<button class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" onclick="window.location.replace('index.php')" name="rememberme" value="Annuler" /> <!-- Bouton d'annulation -->
    
    
</br>
<?php 

   if (isset($_GET['erreure']))   
   {$error=htmlspecialchars($_GET['erreure']);

switch ($error) {
   
    case 1:

        echo " email existant ";
        break;
            
        
    case 2:
        
        echo " pseudo existant ";
        break;
        
    case 3:
        
        echo " mots de passe non identiques ";
        break;
        
        
    case 4:
        echo "vous avez ete deconnecte";
        break;
        
    case 5:
        echo "New record created successfully";
        break;
        
        
        
        
              }
}
?>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
   
</form>
       
    
    
    
    
    
    
    
    
    
    
