<?php
//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//llamado del archivo config.ini, donde se guardan las variables ambientales

$config = parse_ini_file('config.ini');

//decalracion de variables ambientales
$clientIDGoogleLogin = $config['clientID'];
$clientSecretGoogleLogin = $config['clientSecret'];
$redirectUriGoogleLogin = $config['redirectUri'];

//Acceso a la API de Google medainte las credenciales
$clienteGoogle = new Google_Client();

//id del clienteGoogle
$clienteGoogle -> setClientId($clientIDGoogleLogin);

//secreto de clienteGoogle
$clienteGoogle -> setClientSecret($clientSecretGoogleLogin);

//URL de redireccion despues de hacer login
$clienteGoogle -> setRedirectUri($redirectUriGoogleLogin);

//pedira del perfil el email, y el profile
$clienteGoogle -> addScope("email");
$clienteGoogle -> addScope("profile");

?> 