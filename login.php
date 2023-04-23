<?php
require_once 'php/login/config.php'; //move this line up
session_start(); //add this line
?>
<html lang="en">
<head>
    <link rel="stylesheet" href= "styles/styles.css">
    <link rel="stylesheet" href= "styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/hamburguer.js" defer></script>
    <title>Login</title>
</head>
    <body>
    <?php
    include 'includes/nav.php';
    ?>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header><strong>Log In</strong></header>
                <form action="#">
                    <!-- <div class="field input-field">
                        <input type="email" placeholder="Email" class="input">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="input">
                    </div>

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button>Login</button>
                    </div>

                    <div class="form-link">
                        <span>Ya tienes una cuenta?<a>Signup</a></span>
                    </div>

                    <div class="line"></div> -->

                    <div class="media-options">
                        <?php

                        //se crea un token, y despues le dara acceso al cliente a ese token
                        if (isset($_GET['code'])) {
                            //se crea el token
                            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                            //se le da acceso al token al client
                            $client->setAccessToken($token['access_token']);

                            //informacion del usuario
                            $google_oauth = new Google\Service\Oauth2($client);
                            $google_account_info = $google_oauth->userinfo->get();
                            $email = $google_account_info->email;
                            $name = $google_account_info->name;

                            header('Location: ' . $redirectUriGoogleLogin . '?email=' . urlencode($email));
                            exit;
                            
                        } else {
                            ?>
                            <a href=" <?php echo $client -> createAuthUrl() ?>" class="field google">
                            <img src="img/icons/googleIcon.png" alt="" class="google-img" >
                            <span>
                                Login with Google</span>
                            </a>
                            <?php
                            }
                            ?>
                            </div>
                </form>
            </div>
        </div>
    </section>

    <?php
    include 'includes/footer.php';
    ?>
    </body>
</html>