<?php
include 'php/db.php';

$emailNoValid = $passNoValid = $passNoMatch= '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    // Check if the passwords match
    if ($password !== $confirmPassword) {
        $passNoMatch = "Las contraseñas deben de coincidir. Verifiquelo.";
    }

    //confirmar que la password tenga al menos una mayuscula, un numero y al menos 8 caracteres
    $passSecurity = "/^(?=.*[A-Z])(?=.*\d).{8,}$/";

    if(!preg_match($passSecurity, $password)) {
        $passNoValid = "Necesario: numero, letra mayuscula y 8 o mas caracteres";
    }

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $emailNoValid = "Ya hay un usuario con ese email, escoja otro.";
    }

    //en caso que no haya errores los mensajes se dice que estan empty
    if(empty($emailNoValid) && empty($passNoValid) && empty($passNoMatch)) {
        //se coge la variable password y se pasa por una funcion de encryptacion hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (email, password, first_name, last_name) VALUES ('$email', '$hashedPassword', '$firstName', '$lastName')";
        mysqli_query($conn, $insertQuery);

        // Redirect to index.php or any desired page
        header("Location: index.php");
        exit();
    }
}
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
    <script src="scripts/login.js"></script>
    <title>Crea tu usuario</title>
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
                        <span class="error-message"><?php echo $emailNoValid; ?></span><br><br>
                        
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Contraseña" class="input" required>
                        <span class="error-message"><?php echo $passNoValid; ?></span><br><br>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="confirm_password" placeholder="Confirma contraseña" class="input" required>
                        <span class="error-message"><?php echo $passNoMatch; ?></span><br><br>
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