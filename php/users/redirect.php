<?php 
include 'php/users/login.php';
include 'php/db.php';


if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Query the database to get user details
    $query = "SELECT first_name, last_name, email, permiso FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Check if user exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $email = $row['email'];
        $permiso = $row['permiso'];

        if ($permiso != $controlPermiso) {
            header("Location: index");
            exit();
        }
    } else {
        header("Location: index");
        exit();
    }
} else {
    header("Location: index");
    exit();
}

error_reporting(E_ALL & ~E_NOTICE);
