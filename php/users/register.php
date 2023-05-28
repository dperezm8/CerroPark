<?php
include 'php/db.php';

$emailNoValido = $passNoValido = $passDontMatch= '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    // Check if the passwords match
    if ($password !== $confirmPassword) {
        $passDontMatch = "Las contraseñas deben de coincidir. Verifiquelo.";
    }

    //confirmar que la password tenga al menos una mayuscula, un numero y al menos 8 caracteres
    $passSecurity = "/^(?=.*[A-Z])(?=.*\d).{8,}$/";

    if(!preg_match($passSecurity, $password)) {
        $passNoValido = "Necesario: numero, letra mayuscula y 8 o mas caracteres";
    }

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $emailNoValido = "Ya hay un usuario con ese email, escoja otro.";
    }

    //en caso que no haya errores los mensajes se dice que estan empty
    if(empty($emailNoValido) && empty($passNoValido) && empty($passDontMatch)) {
        //se coge la variable password y se pasa por una funcion de encryptacion hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (email, password, first_name, last_name) VALUES ('$email', '$hashedPassword', '$firstName', '$lastName')";
        mysqli_query($conn, $insertQuery);

        // Redirect to index.php or any desired page
        header("Location: login.php");
        exit();
    }
}
?>