<?php
session_start();

if (!isset($_SESSION['idUsuarioCoche'])) {
    header("Location: index.php");
    exit();
}
include 'php/db.php';

$matriculaNoValida = '';
$maximoCoches = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paisDeMatricula = $_POST['paisDeMatricula'];
    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $cocheTemporal = $_POST['cocheTemporal'];

    if ($cocheTemporal == 1) {
        $validoHasta = date('Y-m-d', strtotime('+2 months'));
    } else if ($cocheTemporal == 0) {
        $validoHasta = $_POST['validoHasta'];
    }

    $fechaAlta = date('Y-m-d');

    $deBaja = 0;
    $fechaBaja = '';
    $idUsuarioCoche = $_SESSION['idUsuarioCoche'];

    // Check if car with the same license plate already exists using prepared statement
    $query = "SELECT * FROM coches WHERE matricula=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $matricula);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $matriculaNoValida = "Ya hay un coche con esa matricula registrado.";
    }
    
    $stmt1 = $conn->prepare("SELECT COUNT(*) FROM coches WHERE idUsuarioCoche = $idUsuarioCoche");
    $stmt1 = mysqli_prepare($conn, $query);
    //Saco el resultado del query y lo guardo en la variable result, todo el contenido total
    mysqli_stmt_bind_param($stmt1, 's', $idUsuarioCoche);
    mysqli_stmt_execute($stmt1);
    $result1 = mysqli_stmt_get_result($stmt1);
    //Resultcheck devuelve el número de filas que hay en el resultado del query
    
        if (mysqli_num_rows($result1) > 2) {
            $maximoCoches = "Ha superado el numero maximo de vehiculos (2).";
        }

    // If there are no errors, insert the new car into the database using prepared statement
    if (empty($matriculaNoValida) && empty($maximoCoches)) {
        // Encrypt the license plate using Argon2

        $insertQuery = "INSERT INTO coches (paisDeMatricula, matricula, marca, modelo, validoHasta, cocheTemporal, fechaAlta, deBaja, fechaBaja, idUsuarioCoche) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, 'ssssssssss', $paisDeMatricula, $matricula, $marca, $modelo, $validoHasta, $cocheTemporal, $fechaAlta, $deBaja, $fechaBaja, $idUsuarioCoche);

        if (mysqli_stmt_execute($stmt)) {
            session_start();
            $_SESSION['matricula'] = $matriculaSinHash;
            $idUsuarioCoche = $_SESSION['idUsuario'];

            // Append the userId variable to the URL
            header("Location: index.php?creation_success&mensajeCoches=$maximoCoche&matricula=$");
            exit();
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    }
}
?>