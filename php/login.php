<?php
include 'db.php';
session_start();

$emailNoValid = $passNoValid = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //confirmar que el email este en la base de datos
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    //mirar dentro de la base de datos
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password']; //se dice que la password encriptada sera igual a la que aparezca en la misma fila en la bbdd

        //verificar que la password sea igual a la password encriptada
        if(password_verify($password, $hashedPassword)) {
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            $passNoValid = 'Contraseña no valida';
        }
    } else {
        $emailNoValid = 'No exite usuario con ese email';
    }

}
?>