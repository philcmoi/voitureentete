<?php
session_start();
// Initialisation de la session.
// Si vous utilisez un autre nom
// session_name("autrenom")


 //Détruit toutes les variables de session
//$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
// if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(session_name(), '', time() - 42000,
//         $params["path"], $params["domain"],
//         $params["secure"], $params["httponly"]
//         );
// }

// setcookie("email",$email, time() -365*24*3600*2,'/','localhost',false,true);
// setcookie("token",$token, time() -365*24*3600*2,'/','localhost',false,true);
// $_SESSION['logged'] = NULL;

// Détruit toutes les variables de session
$_SESSION = array();

session_destroy();
// Finalement, on détruit la session.
//session_destroy();
header("Location: index.php?error=3");
// session_destroy();
 ?>