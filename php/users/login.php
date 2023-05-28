<?php
include 'php/db.php';
require_once 'Usuario.php';
session_start();

$emailNoValid = $passNoValid = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Confirm that the email exists in the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Check the database for the user
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        // Verify the password matches the hashed password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['email'] = $email;
            $userId = $row['id'];
            //mediante funcion hash se encripta la id del usuario
            $hashedId = hash('md5', $userId);
            //se añade la id del usuario al urlsss
            header("Location: index.php?id=$hashedId");
            exit();
        } else {
            $passNoValid = 'Contraseña no válida';
        }
    } else {
        $emailNoValid = 'No existe un usuario con ese correo electrónico';
    }
}
?>