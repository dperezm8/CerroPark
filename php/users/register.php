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

   // Check if email already exists using prepared statement
   $query = "SELECT * FROM users WHERE email=?";
   $stmt = mysqli_prepare($conn, $query);
   mysqli_stmt_bind_param($stmt, 's', $email);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);

   if (mysqli_num_rows($result) > 0) {
       $emailNoValido = "Ya hay un usuario con ese email, escoja otro.";
   }

   // If there are no errors, insert the new user into the database using prepared statement
   if(empty($emailNoValido) && empty($passNoValido) && empty($passDontMatch)) {
       $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
       $insertQuery = "INSERT INTO users (email, password, first_name, last_name) VALUES (?, ?, ?, ?)";
       $stmt = mysqli_prepare($conn, $insertQuery);
       mysqli_stmt_bind_param($stmt, 'ssss', $email, $hashedPassword, $firstName, $lastName);
       mysqli_stmt_execute($stmt);

       // Redirect to index.php or any desired page
       session_start();
       $_SESSION['email'] = $email;
       //se añade la id del usuario al urlsss
       header("Location: index.php");
       exit();
   }
}
?>