<?php
session_start();

if (!isset($_SESSION['email'])) {
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
    if ($deBaja == 1) {
        $fechaBaja = date('Y-m-d');
    } else if ($deBaja == 0); {
        $fechaBaja = '';
    }
    
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

    $countQuery = "SELECT COUNT(*) AS carCount FROM coches WHERE idUsuarioCoche=? and deBaja = 0";
    $countStmt = mysqli_prepare($conn, $countQuery);
    mysqli_stmt_bind_param($countStmt, 'i', $idUsuarioCoche);
    mysqli_stmt_execute($countStmt);
    $countResult = mysqli_stmt_get_result($countStmt);
    $countRow = mysqli_fetch_assoc($countResult);
    $carCount = $countRow['carCount'];

    if ($carCount >= 2) {
        $maximoCoches = "Ha superado el numero maximo de vehiculos (2). Regresando a Inicio";
        $cochesMensaje = "No se ha podido crear el coche";
    } else {
        $cochesMensaje = "Coche creado con exito";
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
            header("Location: index?creation_success&$cochesMensaje");
            exit();
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else if (!empty($maximoCoches)) {
        echo '<script>
        setTimeout(function() {
            window.location.href = "index?creation_failure&' . $cochesMensaje. '";
        }, 3000);
    </script>';
    }
}
error_reporting(E_ALL & ~E_NOTICE);
?>