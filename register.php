<?php
include 'php/users/register.php';

?>
<html lang="en">
<head>
    <link rel="stylesheet" href= "styles/styles.css">
    <link rel="stylesheet" href= "styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Crea tu usuario</title>
    <link rel="icon" type="image/png" href="img/logos/logoCerroPark.png" sizes="64x64">
    <link rel="icon" href="img/logos/logoCerroParkCircle.png" type="image/png" sizes="192x192">
</head>
<body>
    <?php
    include 'includes/nav.php';
    ?>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header><strong>Crea tu usuario</strong></header>
                <form method="POST" action="register.php">
                    <div class="field input-field">
                        <input type="text" name="first_name" placeholder="Nombre" class="input" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>" required>
                    </div>

                    <div class="field input-field">
                        <input type="text" name="last_name" placeholder="Apellidos" class="input" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>" required>
                    </div>

                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
                        <span class="error-message"><?php echo $emailNoValido; ?></span><br><br>
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Contraseña" class="input" required>
                        <span class="error-message"><?php echo $passNoValido; ?></span><br><br>
                    </div>

                    <div class="field input-field">
                        <input type="password" name="confirm_password" placeholder="Confirma contraseña" class="input" required>
                        <span class="error-message"><?php echo $passDontMatch; ?></span><br><br>
                    </div>

                    <div class="field button-field">
                        <button type="submit">
                            Registrate</button>
                    </div>

                    <div class="form-link">
                        <span>Ya tienes una cuenta?<a href="login">Inicia sesion </a></span>
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