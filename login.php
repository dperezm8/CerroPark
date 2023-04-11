<?php
require 'php/login/authen.php'
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
                        <a href="<?php require 'php/login/authen.php';
echo $clienteGoogle -> createAuthUrl()?>" class="field google">
                            
                            <img src="img/icons/googleIcon.png" alt="" class="google-img" >
                            <span>
                            Login with Google</span>
                        </a>
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