
<?php
require_once 'config.php';

session_start();

if(isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
        'email' => $google_account_info['email'],
        'first_name' => $google_account_info['givenName'],
        'last_name' => $google_account_info['familyName'],
        'gender' => $google_account_info['gender'],
        'full_name' => $google_account_info['full_name'],
        'verifiedEmail' => $google_account_info['verifiedEmail'],
        'token' => $google_account_info['id'],
    ];

    //comprobar si el usuario ya está registrado
    $sql = "SELECT * FROM users WHERE email = '{userinfo['email']}'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($results) > 0) {

    } else {
        $sql = "INSERT INTO users (email, first_name, last_name, gender, full_name, picture, verifiedEmail, token)
        VALUES ('{userinfo['email']}','{userinfo['first_name']}','{userinfo['last_name']}','{userinfo['gender']}',
        '{userinfo['full_name']}', '{userinfo['verifiedEmail']}','{userinfo['token']}'";

        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "Usuario creado con exito";
            $token = $userinfo['token'];
        } else {
            echo "No se ha creado un usuario nuevo";
            die(); //muere la conexion
        }
    }

    $_SESSION['user_token'] = $userinfo['token'];

}

?>