<nav class="navbar">
    <div class="logonav">
        <div class="imagennav">
            <img src="img/logos/escudoDiocesis.png" width="150px">
            
<?php
require_once 'php/login/config.php';

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

    echo "<img src=" . $userinfo['picture'] . "width='75px' style='border-radius:50%'>";
} else {
    if (!isset($_SESSION['user_token'])) {
        header("Location: index.php");
        die();
      }
    
      // checking if user is already exists in database
      $sql = "SELECT * FROM users WHERE token ='{$_SESSION['user_token']}'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // user is exists
        $userinfo = mysqli_fetch_assoc($result);
      }
      
    echo "<img src='img/icons/imagenPerfil.png' width='75px' style='boder-radius:50%'>";
}

?>

        </div>
    </div>
    <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class=""></span>
            <span class="bar"></span>
            <span class=""></span>
            <span class="bar"></span>
            <span class=""></span>
        </a>
        <div class="navbar-links">
            <ul>
                
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="logout.php">Cerrar Sesion</a></li>
                <li><a href="#">Añadir coche</a></li>

            </ul>
        </div>
</nav>