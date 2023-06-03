<?php
include 'php/users/login.php';
?>

<html lang="en">
<head>
    <link rel="stylesheet" href= "styles/styles.css">
    <link rel="stylesheet" href= "styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Inicia Sesión</title>
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
                <header><strong>Inicia Sesión</strong></header>
                <form method="POST" action="login.php">
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input" value="<?=isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        <span class="error-message"><?=$emailNoValid; ?></span><br><br>
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Contraseña" class="input" value = "<?=isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                        <span class="error-message"><?=$passNoValid; ?></span><br><br>
                    </div>

                    <div class="field button-field">
                        <button>Inicia Sesión</button>
                    </div>

                    <div class="form-link">
                        <span>Aún no tienes cuenta?<a href="register">Registrate</a></span>
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
<!--
    
Web administrativa para el Cerro de Los Angeles
Creada por ʕ•ᴥ•ʔ Diego Pérez ʕ•ᴥ•ʔ

-->