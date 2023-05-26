<?php
include 'db.php';

$emailNoValid = $passNoValid = $passNoMatch= '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);

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