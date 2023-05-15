<?php
require_once 'vendor/autoload.php';

session_start();

//credeciales de Google obtenidas mediante la creacion de una app en https://console.cloud.google.com/
$clientID = '32942193277-m9sjhabr7ctmc8lrsp5cds418s6snnh8.apps.googleusercontent.com';
$clientSecret = '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';
$redirectURI = 'http://localhost/TFG/CerroPark/index.php';

//cliente Google
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectURI);
$client->addScope("email");
$client->addScope("profile");

//conexion a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$database = "cerro_park";

$conn = mysqli_connect($host, $user, $pass, $database);

?>