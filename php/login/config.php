<?php
//Include Google Client Library for PHP autoload file
require_once '../../vendor/autoload.php';

//llamado del archivo config.ini, donde se guardan las variables ambientales

$config = parse_ini_file('config.ini');

//decalracion de variables ambientales
$clientIDGoogleLogin = $config['clientID'];
$clientSecretGoogleLogin = $config['clientSecret'];
$redirectUriGoogleLogin = $config['redirectUri'];

//Acceso a la API de Google medainte las credenciales
$client = new Google\Client();

//id del client
$client -> setClientId($clientIDGoogleLogin);

//secreto de client
$client -> setClientSecret($clientSecretGoogleLogin);

//URL de redireccion despues de hacer login
$client -> setRedirectUri($redirectUriGoogleLogin);

//pedira del perfil el email, y el profile
$client->addScope('https://www.googleapis.com/auth/userinfo.email');
$client->addScope('https://www.googleapis.com/auth/userinfo.profile');


?> 