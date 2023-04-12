<?php
require_once 'config.php';

//se crea un token, y despuesse le dara acceso al cliente a ese token
if (isset($_GET['code'])) {
    //se crea el token
    $token = $clienteGoogle -> fetchAccessTokenWithAuthCode($_GET['code']);
    //se le da acceso al token al clienteGoogle
    $clienteGoogle -> setAccessToken($token['access_token']);

    //informacion del usuario
    $google_oauth = new Google_Service_Oauth2($clienteGoogle);
    $google_account_info = $google_oauth -> userinfo -> get();
    $email = $google_account_info -> email;
    $name = $google_account_info -> name;
    $picture_url = $google_account_info->picture;
    
}


?>