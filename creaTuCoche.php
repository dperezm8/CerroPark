<head>
    <link rel="stylesheet" href= "styles/styles.css">
    <link rel="stylesheet" href= "styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/hamburguer.js" defer></script>
    <script src="scripts/login.js"></script>
    <title>Añade tu Coche</title>
    <style>
        
.error-message {
    display: block;
    margin-top: 5px;
    color: rgb(255, 46, 54);
}
    </style>
</head>
    <body>
    <?php
    include 'includes/nav.php';
    ?>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header><strong>Añade tu Coche</strong></header>
                <form method="POST" action="register.php">
                <div class="field input-field">
                        <input type="text" name="marca" placeholder="Marca" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="text" name="modelo" placeholder="Modelo" class="input" required>
                    </div>
                    <div class="field input-field">
                        <select name="email" placeholder="Email" class="input" required>      
                            <option hidden><option>
                            <option value='1'>A<option>                  
                            <option value='1'>B<option>                  
                            <option value='1'>C<option>                  
                            <option value='1'>D<option>                  
                    </div>

                    <div class="field input-field">
                        <input type="text" name="password" placeholder="Contraseña" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="text" name="confirm_password" placeholder="Confirma contraseña" class="input" required>
                    </div>

                    <div class="field button-field">
                        <button type="submit">
                            Registrate</button>
                    </div>

                    <div class="form-link">
                        <span>Ya tienes una cuenta?<a href="login.php">Inicia sesion </a></span>
                    </div>

                    <!-- <div class="line"></div>  -->

                    <!-- <div class="media-options">
                        
                        <?php
                        // require_once 'php/login/config.php'; 
                        // if(isset($_SESSION['user_token'])) {
                        //     header("Location: index.php");
                        // } else {
                        //     echo "<a href='". $client->createAuthUrl()."' class='field google'>";
                        // }
                    ?>
                    <img src="img/icons/googleIcon.png" alt="" class="google-img" >

                    <span>
                        Login with Google</span>
                    </a>
                </div> -->
            </form>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php';
?>
</body>
</html>